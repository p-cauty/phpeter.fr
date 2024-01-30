@php /** @var \App\Models\Blog[] $blogs */ @endphp
<x-admin-layout>
    <x-slot name="header">
        <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
            <div class="container-xl px-4">
                <div class="page-header-content pt-4">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-auto mt-4">
                            <h1 class="page-header-title">
                                <div class="page-header-icon"><i data-feather="feather"></i></div>
                                Articles de blog
                            </h1>
                            <div class="page-header-subtitle">Gérer les articles de blogs visibles sur le site</div>
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
                        <a href="{{ route('admin.blogs.create') }}" class="btn btn-success mb-3">
                            <i class="fas fa-plus-circle me-2"></i>
                            Nouvel article
                        </a>
                        <div class="table-responsive">
                            <table id="datatable" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Titre</th>
                                    <th>Auteur</th>
                                    <th>Statut</th>
                                    <th>Création</th>
                                    <th>Modification</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($blogs as $blog)
                                    <tr>
                                        <td>{{ $blog->title }}</td>
                                        <td>{{ $blog->user->fullname }}</td>
                                        <td>{!!
                                            $blog->isPublished() ?
                                                '<span class="badge bg-success rounded-pill">Publié</span>' :
                                                '<span class="badge bg-primary rounded-pill">Brouillon</span>'
                                        !!}</td>
                                        <td>{{ $blog->created_at->format('d/m/Y H:i') }}</td>
                                        <td>{{ $blog->updated_at->format('d/m/Y H:i') }}</td>
                                        <td>
                                            <a href="{{ route('admin.blogs.edit', $blog) }}"
                                               class="btn btn-primary btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.blogs.destroy', $blog) }}"
                                                  method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Voulez-vous vraiment supprimer cet article ? Cette action est irréversible.')">
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
