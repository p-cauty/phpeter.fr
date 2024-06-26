<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(): View
    {
        return view('blog.index', [
            'blogs' => Blog::whereNotNull('published_at')->orderBy('published_at', 'desc')->paginate(),
        ]);
    }

    public function show(Blog $blog): View
    {
        if (!$blog->isPublished() && !auth()->check()) {
            abort(404);
        }

        return view('blog.show', [
            'blog' => $blog
        ]);
    }
}
