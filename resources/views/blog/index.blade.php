@php /** @var \App\Models\Blog[] $blogs */ @endphp
<x-front-layout>
    <x-slot name="title">Blog - {{ config('app.title') }}</x-slot>
    <header class="page-header-ui page-header-ui-dark bg-img-cover overlay overlay-80 pt-15" style="background-image: url({{ asset('img/blog.jpg') }})">
        <div class="page-header-ui-content position-relative">
            <div class="container px-5 text-center">
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-8">
                        <h1 class="text-white mb-3">Blog</h1>
                        <p class="page-header-ui-text mb-0">Retrouvez ici nos derniers billets & tutos</p>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <section class="bg-light py-10">
        <div class="container px-5">
            @if (isset($blogs[0]))
                <a class="card post-preview post-preview-featured lift mb-5 overflow-hidden" data-aos="fade-left"
                   href="{{ route('blog.show', ['blog' => $blogs[0], 'slug' => \Illuminate\Support\Str::slug($blogs[0]->title)]) }}">
                    <div class="row g-0">
                        <div class="col-lg-5"><div class="post-preview-featured-img"
                            style="background-image: url({{ \Illuminate\Support\Facades\Storage::url($blogs[0]->illustration) }})"></div></div>
                        <div class="col-lg-7">
                            <div class="card-body">
                                <div class="py-5">
                                    <h5 class="card-title">{{ $blogs[0]->title }}</h5>
                                    <p class="card-text">
                                        {{ \Illuminate\Support\Str::limit($blogs[0]->preview, 200) }}
                                    </p>
                                </div>
                                <hr />
                                <div class="post-preview-meta">
                                    <img class="post-preview-meta-img" src="{{ $blogs[0]->user->gravatar }}" />
                                    <div class="post-preview-meta-details">
                                        <div class="post-preview-meta-details-name">{{ $blogs[0]->user->fullname }}</div>
                                        <div class="post-preview-meta-details-date">
                                            {{ $blogs[0]->published_at->format('d/m/Y') }}
                                            &middot;
                                            {{ $blogs[0]->reading_time }} min</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                @php unset($blogs[0]) @endphp
            @endif
            <div class="row gx-5">
                @foreach ($blogs as $blog)
                    <div class="col-md-6 col-xl-4 mb-5" data-aos="fade-up">
                        <a class="card post-preview lift h-100"
                            href="{{ route('blog.show', ['blog' => $blog, 'slug' => \Illuminate\Support\Str::slug($blog->title)]) }}">
                            <img class="card-img-top" src="{{ \Illuminate\Support\Facades\Storage::url($blog->illustration) }}" alt="..." />
                            <div class="card-body">
                                <h5 class="card-title">{{ $blog->title }}</h5>
                                <p class="card-text">{{ \Illuminate\Support\Str::limit($blog->preview) }}</p>
                            </div>
                            <div class="card-footer">
                                <div class="post-preview-meta">
                                    <img class="post-preview-meta-img" src="{{ $blog->user->gravatar }}" />
                                    <div class="post-preview-meta-details">
                                        <div class="post-preview-meta-details-name">{{ $blog->user->fullname }}</div>
                                        <div class="post-preview-meta-details-date">
                                            {{ $blog->published_at->format('d/m/Y') }}
                                            &middot;
                                            {{ $blog->reading_time }} min
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>

            {{ $blogs->links() }}
        </div>
    </section>
    <x-statistics />
    <x-testimonials />
    <x-f-a-q />
</x-front-layout>