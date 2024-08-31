<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AttachmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $attachments = collect(glob(public_path('storage/attachments/*')));
        $attachments = $attachments->sortByDesc('filectime');
        $attachments = $attachments->mapWithKeys(function ($attachment, $key) {
            return [$key => basename($attachment)];
        });

        return view('admin.attachments.index', [
            'attachments' => $attachments,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FormRequest $request): RedirectResponse
    {
        $validated = $request->validate([
            'attachment' => 'required|file|max:4096|mimes:pdf,docx,xlsx,pptx,zip,jpg,png,jpeg,gif',
        ]);

        $request->file('attachment')->store('attachments', 'public');

        return back()->with('success', 'Pièce jointe téléchargée avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $filename): RedirectResponse
    {
        $filepath = public_path('storage/attachments/' . base64_decode($filename));

        if (file_exists($filepath)) {
            unlink($filepath);
        }

        return back()->with('success', 'Pièce jointe supprimée avec succès');
    }
}
