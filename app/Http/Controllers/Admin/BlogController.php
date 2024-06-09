<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('admin.blogs.index', [
            'blogs' => Blog::latest('published_at')->orderByDesc('id')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FormRequest $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string'],
            'illustration' => ['required', 'image', 'max:1024'],
        ]);

        $validated['illustration'] = $request->file('illustration')->storePublicly('blogs', 'public');

        $blog = Blog::create([
            ...$validated,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('admin.blogs.edit', $blog)
            ->with('success', 'L\'article a bien été créé.');
    }

    public function publish(Blog $blog): RedirectResponse
    {
        $blog->update([
            'published_at' => now(),
        ]);

        return redirect()->route('admin.blogs.index')
            ->with('success', 'L\'article a bien été publié.');
    }

    public function draft(Blog $blog): RedirectResponse
    {
        $blog->update([
            'published_at' => null,
        ]);

        return redirect()->route('admin.blogs.index')
            ->with('success', 'L\'article a bien été dé-publié.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog): View
    {
        return view('admin.blogs.edit', [
            'blog' => $blog
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FormRequest $request, Blog $blog): RedirectResponse|JsonResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string'],
            'illustration' => ['image', 'max:1024'],
            'content' => ['required', 'string'],
        ]);

        if ($request->hasFile('illustration')) {
            $validated['illustration'] = $request->file('illustration')->storePublicly('blogs', 'public');
        }

        if (!$request->has('publish')) {
            $validated['published_at'] = null;
        } elseif (!$blog->isPublished()) {
            $validated['published_at'] = now();
        }

        $blog->update([
            ...$validated,
            'html' => markdown($validated['content'])
        ]);

        if ($request->has('json')) {
            return response()->json([
                'html' => $blog->html
            ]);
        }

        return redirect()->route('admin.blogs.edit', [
            'blog' => $blog,
            'slug' => Str::slug($blog->title)
        ])->with('success', 'L\'article a bien été modifié.');
    }

    public function parse(FormRequest $request, Blog $blog): JsonResponse
    {
        $validated = $request->validate([
            'content' => ['required', 'string'],
        ]);

        $blog->update([
            'content' => $validated['content'],
            'html' => markdown($validated['content']),
        ]);

        return response()->json([
            'html' => $blog->html,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog): RedirectResponse
    {
        $blog->delete();

        return redirect()->route('admin.blogs.index')
            ->with('success', 'L\'article a bien été supprimé.');
    }
}
