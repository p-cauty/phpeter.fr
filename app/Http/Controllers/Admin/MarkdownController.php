<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MarkdownController extends Controller
{
    public function parse(FormRequest $request): JsonResponse
    {
        $validated = $request->validate([
            'content' => ['required', 'string'],
        ]);

        return response()->json([
            'html' => markdown($validated['content']),
        ]);
    }
}
