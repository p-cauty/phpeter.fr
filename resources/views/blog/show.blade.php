@php /** @var \App\Models\Blog $blog */ @endphp
<x-front-layout>
    <x-slot name="title">{{ $blog->title }}</x-slot>
    <x-slot name="description">{{ \Illuminate\Support\Str::limit($blog->preview, 150) }}</x-slot>
    <x-slot name="illustration">{{ config('app.url') . \Illuminate\Support\Facades\Storage::url($blog->illustration) }}</x-slot>
    <section class="bg-light py-5 py-lg-10">
        <div class="container px-5">
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-10 col-xl-8">
                    <div class="single-post">
                        <h2>{{ $blog->title }}</h2>
                        <div class="d-flex align-items-center justify-content-between mb-5">
                            <div class="single-post-meta me-4">
                                <img class="single-post-meta-img" src="{{ $blog->user->gravatar }}" />
                                <div class="single-post-meta-details">
                                    <div class="single-post-meta-details-name">{{ $blog->user->fullname }}</div>
                                    <div class="single-post-meta-details-date">
                                        {{ $blog->created_at->format('d/m/Y') }}
                                        &middot;
                                        {{ $blog->reading_time }} min
                                    </div>
                                </div>
                            </div>
                            <div class="single-post-meta-links">
                                <a href="{{ $blog->twitter_share_url }}"
                                    onclick="window.open('{{ $blog->twitter_share_url }}', 'popup', 'width=600,height=360');return false;"
                                    target="popup" rel="noopener" title="Partager sur X/Twitter"><i class="fab fa-x-twitter fa-fw"></i></a>
                                <a href="{{ $blog->facebook_share_url }}"
                                    onclick="window.open('{{ $blog->facebook_share_url }}', 'popup', 'width=530,height=750');return false;"
                                    target="popup" rel="noopener" title="Partager sur Facebook"><i class="fab fa-facebook-f fa-fw"></i></a>
                                <a href="{{ $blog->email_share_url }}" title="Partager par e-mail"><i class="fas fa-envelope fa-fw"></i></a>
                            </div>
                        </div>
                        <img class="img-fluid mb-2 rounded" src="{{ \Illuminate\Support\Facades\Storage::url($blog->illustration) }}" />
                        <div class="single-post-text my-5 markdown">
                            {!! $blog->html !!}
                            <hr class="my-5" />
                            <div class="text-center"><a class="btn btn-transparent-dark" href="{{ route('blog.index') }}">
                                &larr; Retour au blog
                            </a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <x-statistics />
    <x-testimonials />
    <x-f-a-q />
</x-front-layout>
