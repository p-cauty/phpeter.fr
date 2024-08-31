<x-admin-layout>
    <x-slot name="header">
        <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
            <div class="container-xl px-4">
                <div class="page-header-content pt-4">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-auto mt-4">
                            <h1 class="page-header-title">
                                <div class="page-header-icon"><i data-feather="file"></i></div>
                                Pièces jointes
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
                        <form action="{{ route('admin.attachments.store') }}" method="POST" enctype="multipart/form-data"
                            class="row row-cols-lg-auto align-items-center mb-5">
                            @csrf
                            <div class="col-12">
                                <input type="file" class="form-control" name="attachment" required />
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-download me-2"></i>
                                    Télécharger
                                </button>
                            </div>
                        </form>
                        <div class="table-responsive">
                            <table id="datatable" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Vignette</th>
                                    <th>Nom de fichier</th>
                                    <th>Date d'ajout</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($attachments as $k => $attachment)
                                    <tr>
                                        <td>
                                            <img style="max-height:30px;max-width:30px;" src="{{ asset('storage/attachments/' . $attachment) }}"
                                                class="img-rounded shadow-sm" />
                                        </td>
                                        <td>
                                            <span class="d-flex justify-content-between">
                                                <a href="{{ asset('storage/attachments/' . $attachment) }}" target="_blank">
                                                    {{ $attachment }}
                                                </a>
                                                <span data-bs-toggle="tooltip" data-bs-placement="top" title="Copier" style="cursor:pointer"
                                                    id="attach-{{ $k }}" onclick="copyToClipboard('/storage/attachments/{{ $attachment }}', this/*'#attach-{{ $k }}'*/)">
                                                    <i class="far fa-clone"></i>
                                                </span>
                                            </span>
                                        </td>
                                        <td>
                                            {{ date('d/m/Y H:i', filectime(public_path('/storage/attachments/' . $attachment))) }}
                                        </td>
                                        <td>
                                            <form action="{{ route('admin.attachments.destroy', base64_encode($attachment)) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Supprimer"
                                                    onclick="return confirm('Êtes-vous sur de vouloir supprimer cette pièce jointe ? Cette action est irréversible.')">
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
    <script>
        const copyToClipboard = (text, selector) => {
            if (navigator.clipboard) {
                navigator.clipboard.writeText(text);
            }

            const tooltip = new bootstrap.Tooltip(selector);
            tooltip.hide();

            selector.setAttribute('data-bs-original-title', 'Copié ✅');
            tooltip.show();

            setTimeout(() => {
                selector.setAttribute('data-bs-original-title', 'Copier');
            }, 1000);

            /*const tooltip = bootstrap.Tooltip.getInstance(selector);
            tooltip.setContent('Copié ✅');

            setTimeout(() => {
                tooltip.setContent('Copier');
            }, 1000);*/
        }
    </script>
</x-admin-layout>
