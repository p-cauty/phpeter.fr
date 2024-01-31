<?php

namespace App\Http\Controllers;

use App\Models\CaseStudy;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CaseStudyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('case-studies.index', [
            'case_studies' => CaseStudy::whereNotNull('published_at')->orderBy('published_at', 'desc')->get(),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(CaseStudy $case_study): View
    {
        if (!$case_study->isPublished() && !auth()->check()) {
            abort(404);
        }

        return view('case-studies.show', [
            'case_study' => $case_study,
        ]);
    }
}
