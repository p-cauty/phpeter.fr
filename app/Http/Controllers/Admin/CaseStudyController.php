<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CaseStudy;
use Illuminate\Contracts\View\View;
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
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.case-studies.create');
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
            'content' => ['required', 'string'],
        ]);

        $validated['illustration'] = $request->file('illustration')->storePublicly('public/case-studies');
        CaseStudy::create([
            ...$validated,
            'html' => markdown($validated['content'])
        ]);

        return redirect()->route('admin.case-studies.index')
            ->with('success', 'L\'étude de cas a bien été créée.');
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
            $validated['illustration'] = $request->file('illustration')->storePublicly('public/case-studies');
            Storage::delete($case_study->illustration);
        }

        $case_study->update([
            ...$validated,
            'html' => markdown($validated['content'])
        ]);

        return redirect()->route('admin.case-studies.edit', ['case_study' => $case_study])
            ->with('success', 'L\'étude de cas a bien été modifiée.');
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
