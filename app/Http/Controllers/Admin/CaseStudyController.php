<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CaseStudy;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CaseStudyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('admin.case-studies.index', [
            'case_studies' => CaseStudy::orderByDesc('id')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
            'illustration' => ['required', 'image', 'max:1024'],
        ]);

        $validated['illustration'] = $request->file('illustration')->storePublicly('case-studies', 'public');

        $case_study = CaseStudy::create($validated);

        return redirect()->route('admin.case-studies.edit', $case_study)
            ->with('success', 'L\'étude de cas a bien été créée.');
    }

    public function publish(CaseStudy $case_study): RedirectResponse
    {
        $case_study->update([
            'published_at' => now(),
        ]);

        return redirect()->route('admin.case-studies.index')
            ->with('success', 'L\'étude de cas a bien été publiée.');
    }

    public function draft(CaseStudy $case_study): RedirectResponse
    {
        $case_study->update([
            'published_at' => null,
        ]);

        return redirect()->route('admin.case-studies.index')
            ->with('success', 'L\'étude de cas a bien été dé-publiée.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CaseStudy $case_study): View
    {
        return view('admin.case-studies.edit', [
            'case_study' => $case_study,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CaseStudy $case_study): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
            'illustration' => ['nullable', 'image', 'max:1024'],
            'content' => ['required', 'string'],
        ]);

        if ($request->hasFile('illustration')) {
            $validated['illustration'] = $request->file('illustration')->storePublicly('case-studies', 'public');
            Storage::delete($case_study->illustration);
        }

        if (!$request->has('publish')) {
            $validated['published_at'] = null;
        } elseif (!$case_study->isPublished()) {
            $validated['published_at'] = now();
        }

        $case_study->update([
            ...$validated,
            'html' => markdown($validated['content'])
        ]);

        return redirect()->route('admin.case-studies.edit', ['case_study' => $case_study])
            ->with('success', 'L\'étude de cas a bien été modifiée.');
    }

    public function parse(FormRequest $request, CaseStudy $case_study): JsonResponse
    {
        $validated = $request->validate([
            'content' => ['required', 'string'],
        ]);

        $case_study->update([
            'content' => $validated['content'],
            'html' => markdown($validated['content']),
        ]);

        return response()->json([
            'html' => $case_study->html,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CaseStudy $case_study): RedirectResponse
    {
        $case_study->delete();

        return redirect()->route('admin.case-studies.index')
            ->with('success', 'L\'étude de cas a bien été supprimée.');
    }
}
