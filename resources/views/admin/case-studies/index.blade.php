@php use Illuminate\Support\Str; @endphp
@php /** @var \App\Models\CaseStudy[] $case_studies */ @endphp
<x-admin-layout>
    <x-slot name="header">
        <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
            <div class="container-xl px-4">
                <div class="page-header-content pt-4">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-auto mt-4">
                            <h1 class="page-header-title">
                                <div class="page-header-icon"><i data-feather="briefcase"></i></div>
                                Etudes de cas
                            </h1>
                            <div class="page-header-subtitle">Gérer les études de cas publiées sur le site</div>
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
                        <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#newCaseStudyModal">
                            <i class="fas fa-plus-circle me-2"></i>
                            Nouvelle étude de cas
                        </button>
                        <div class="table-responsive">
                            <table id="datatable" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Titre</th>
                                    <th>Statut</th>
                                    <th>Création</th>
                                    <th>Modification</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($case_studies as $case_study)
                                    <tr>
                                        <td>
                                            <a href="{{ route('case-studies.show', ['case_study' => $case_study, 'slug' => Str::slug($case_study->title)]) }}"
                                                  target="_blank">
                                                {{ $case_study->title }}
                                            </a>
                                        </td>
                                        <td>{!!
                                            $case_study->isPublished() ?
                                                '<span class="badge bg-success rounded-pill">Publié</span>' :
                                                '<span class="badge bg-primary rounded-pill">Brouillon</span>'
                                        !!}</td>
                                        <td>{{ $case_study->created_at->format('d/m/Y H:i') }}</td>
                                        <td>{{ $case_study->updated_at->format('d/m/Y H:i') }}</td>
                                        <td>
                                            @if (!$case_study->isPublished())
                                                <form action="{{ route('admin.case-studies.publish', $case_study) }}"
                                                      method="POST" class="d-inline">
                                                    @method('PUT')
                                                    @csrf
                                                    <button type="submit" class="btn btn-success btn-sm"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Publier">
                                                        <i class="fas fa-check-circle"></i>
                                                    </button>
                                                </form>
                                            @else
                                                <form action="{{ route('admin.case-studies.draft', $case_study) }}"
                                                      method="POST" class="d-inline">
                                                    @method('PUT')
                                                    @csrf
                                                    <button type="submit" class="btn btn-warning btn-sm"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Retirer">
                                                        <i class="fas fa-eye-slash"></i>
                                                    </button>
                                                </form>
                                            @endif
                                            <a href="{{ route('admin.case-studies.edit', $case_study) }}"
                                               class="btn btn-primary btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.case-studies.destroy', $case_study) }}"
                                                  method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Voulez-vous vraiment supprimer cette étude de cas ? Cette action est irréversible.')">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" tabindex="-1" id="newCaseStudyModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Nouvelle étude de cas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="new-blog" method="post" action="{{ route('admin.case-studies.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Titre de l'étude</label>
                            <input class="form-control" type="text" name="title" id="title" value="{{ old('title') }}" required />
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Courte description</label>
                            <textarea class="form-control" name="description" id="description" rows="3" required>{{ old('description') }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="illustration" class="form-label">Image de couverture</label>
                            <input type="file" class="form-control" name="illustration" id="illustration" required />
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" form="new-blog" class="btn btn-success">
                        <i class="fas fa-plus-circle me-2"></i>
                        Créer l'étude de cas
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
