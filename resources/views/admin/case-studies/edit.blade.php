@php use Illuminate\Support\Facades\Storage; @endphp
@php /** @var \App\Models\CaseStudy $case_study */ @endphp
<x-admin-layout>
    <x-slot name="header">
        <header class="page-header page-header-dark bg-img-cover overlay pb-10"
                style="background-image:url({{ Storage::url($case_study->illustration) }}">
            <div class="container-xl px-4" style="opacity: 0.9999">
                <div class="page-header-content pt-4">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-auto mt-4">
                            <h1 class="page-header-title">
                                <div class="page-header-icon"><i data-feather="edit"></i></div>
                                {{ $case_study->title }}
                            </h1>
                            <div class="page-header-subtitle">Mettre à jour l'étude de cas</div>
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
                        <form action="{{ route('admin.case-studies.update', ['case_study' => $case_study]) }}"
                              method="post" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="mb-3">
                                <label for="title" class="form-label">Titre de l'étude</label>
                                <input class="form-control" type="text" name="title" id="title"
                                       value="{{ old('title') ?? $case_study->title }}" required/>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Courte description</label>
                                <input type="text" class="form-control" name="description" id="description"
                                       value="{{ old('description') ?? $case_study->description }}" required/>
                            </div>
                            <div class="mb-3">
                                <label for="illustration" class="form-label">Modifier l'image de couverture
                                    (optionnel)</label>
                                <input type="file" class="form-control" name="illustration" id="illustration"/>
                            </div>
                            <div class="mb-3">
                                <label for="content" class="form-label">Contenu de l'étude (#markdown)</label>
                                <textarea class="form-control font-monospace" name="content" id="content" rows="20"
                                          required>{{ old('content') ?? $case_study->content }}</textarea>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                    <input type="checkbox" name="publish" id="publish"
                                           class="form-check me-2" {{ $case_study->isPublished() ? 'checked' : '' }} />
                                    <label for="publish" class="form-check-label">Publier l'étude de cas</label>
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
