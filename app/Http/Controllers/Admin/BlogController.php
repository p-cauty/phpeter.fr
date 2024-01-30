<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('admin.blogs.index', [
            'blogs' => Blog::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FormRequest $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string'],
            'illustration' => ['required', 'image', 'max:1024'],
            'content' => ['required', 'string'],
        ]);

        $validated['illustration'] = $request->file('illustration')->storePublicly('public/blogs');
        if ($request->has('publish')) {
            $validated['published_at'] = now();
        }

        Blog::create([
            ...$validated,
            'user_id' => auth()->id(),
            'html' => markdown($validated['content'])
        ]);

        return redirect()->route('admin.blogs.index')
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
    public function update(Request $request, Blog $blog): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string'],
            'illustration' => ['image', 'max:1024'],
            'content' => ['required', 'string'],
        ]);

        if ($request->hasFile('illustration')) {
            $validated['illustration'] = $request->file('illustration')->storePublicly('public/blogs');
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

        return redirect()->route('admin.blogs.edit', [
            'blog' => $blog,
            'slug' => Str::slug($blog->title)
        ])->with('success', 'L\'article a bien été modifié.');
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
