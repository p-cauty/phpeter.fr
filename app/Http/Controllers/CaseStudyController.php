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
            'case_studies' => CaseStudy::latest()->get(),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(CaseStudy $case_study): View
    {
        return view('case-studies.show', [
            'case_study' => $case_study,
        ]);
    }
}
