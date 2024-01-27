<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CaseStudyRequest;
use App\Models\CaseStudy;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

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
    public function store(CaseStudyRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $validated['illustration'] = $request->file('illustration')->storePublicly('public/case-studies');
        CaseStudy::create($validated);

        return redirect()->route('admin.case-studies.index')
            ->with('success', 'L\'étude de cas a bien été créée.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CaseStudy $case_study)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CaseStudy $case_study)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CaseStudy $case_study)
    {
        //
    }
}
