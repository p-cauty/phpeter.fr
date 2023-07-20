<x-app-layout>
    <x-slot name="header">
        <x-profile-header />
    </x-slot>

    <div class="container-xl px-4 mt-4">
        <x-profile-nav />
        <div class="row">
            <div class="col-lg-8">
                <!-- Change password card-->
                <div class="card mb-4">
                    <div class="card-header">Modifier mon mot de passe</div>
                    <div class="card-body">
                        <form method="post" action="{{ route('password.update') }}">
                            @csrf
                            @method('put')
                            <!-- Form Group (current password)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="current_password">Mot de passe actuel</label>
                                <input class="form-control" id="current_password" name="current_password" type="password" autocomplete="current-password" />
                            </div>
                            <!-- Form Group (new password)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="password">Nouveau mot de passe</label>
                                <input class="form-control" id="password" name="password" type="password" autocomplete="new-password" />
                            </div>
                            <!-- Form Group (confirm password)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="password_confirmation">Confirmation du mot de passe</label>
                                <input class="form-control" id="password_confirmation" name="password_confirmation" type="password" autocomplete="new-password" />
                            </div>
                            <button class="btn btn-primary" type="submit">Mettre à jour</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <!-- Delete account card-->
                <div class="card mb-4">
                    <div class="card-header">Supprimer mon compte</div>
                    <div class="card-body">
                        <p>
                            La suppression de votre compte entraînera la perte de toutes vos informations. Cette action est irréversible.
                        </p>
                        <button type="button" class="btn btn-danger-soft text-danger" data-bs-toggle="modal" data-bs-target="#deleteUserModal">
                            Je comprends, supprimer mon compte
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="deleteUserModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" action="{{ route('profile.destroy') }}">
                    @csrf
                    @method('delete')
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Supprimer mon compte</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>
                            Êtes-vous bien sur de vouloir supprimer votre compte ? Une fois ce dernier supprimé, il vous sera
                            impossible de vous connecter, récupérer les ressources, textes, images, informations diverses qui
                            y sont associées.
                        </p>
                        <p class="text-danger small">Merci d'entrer votre mot de passe pour confirmer la suppression.</p>

                        <div class="mb-3">
                            <label class="small mb-1" for="password">Mot de passe</label>
                            <input class="form-control" id="password" name="password" type="password" autocomplete="current-password" />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-danger">Supprimer mon compte</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>
