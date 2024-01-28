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
                        <a href="{{ route('admin.case-studies.create') }}" class="btn btn-success mb-3">
                            <i class="fas fa-plus-circle me-2"></i>
                            Nouvelle étude de cas
                        </a>
                        <div class="table-responsive">
                            <table id="datatable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Titre</th>
                                        <th>Création</th>
                                        <th>Modification</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($case_studies as $case_study)
                                    <tr>
                                        <td>{{ $case_study->title }}</td>
                                        <td>{{ $case_study->created_at->format('d/m/Y H:i') }}</td>
                                        <td>{{ $case_study->updated_at->format('d/m/Y H:i') }}</td>
                                        <td>
                                            <a href="{{ route('admin.case-studies.edit', $case_study) }}" class="btn btn-primary btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.case-studies.destroy', $case_study) }}" method="POST" class="d-inline">
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
</x-admin-layout>
