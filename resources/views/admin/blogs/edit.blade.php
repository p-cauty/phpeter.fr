@php /** @var \App\Models\Blog $blog */ @endphp
<x-admin-layout>
    <x-slot name="header">
        <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
            <div class="container-xl px-4">
                <div class="page-header-content pt-4">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-auto mt-4">
                            <h1 class="page-header-title">
                                <div class="page-header-icon"><i data-feather="edit"></i></div>
                                {{ $blog->title }}
                            </h1>
                            <div class="page-header-subtitle">Mettre à jour l'article de blog</div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    </x-slot>
    <div class="container-xl px-4 mt-n10">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.blogs.update', ['blog' => $blog]) }}" method="post"
                              enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="mb-3">
                                <label for="title" class="form-label">Titre de l'article</label>
                                <input class="form-control" type="text" name="title" id="title"
                                       value="{{ old('title') ?? $blog->title }}" required/>
                            </div>
                            <div class="mb-3">
                                <label for="illustration" class="form-label">Modifier l'image de couverture
                                    (optionnel)</label>
                                <input type="file" class="form-control" name="illustration" id="illustration"/>
                            </div>
                            <div class="mb-3">
                                <label for="content" class="form-label">Contenu de l'article (#markdown)</label>
                                <textarea class="form-control font-monospace" name="content" id="content" rows="20"
                                          required>{{ old('content') ?? $blog->content }}</textarea>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                    <input type="checkbox" name="publish" id="publish" class="form-check me-2" {{ $blog->isPublished() ? 'checked' : '' }} />
                                    <label for="publish" class="form-check-label">Publier l'article</label>
                                </div>
                                <button type="submit" class="btn btn-success mt-3">
                                    <i class="fas fa-edit me-2"></i>
                                    Mettre à jour
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
