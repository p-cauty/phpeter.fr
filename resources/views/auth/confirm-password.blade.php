<x-guest-layout>
    <div class="row justify-content-center">
        <div class="col-xl-5 col-lg-6 col-md-8 col-sm-11">
            <!-- Social forgot password form-->
            <div class="card my-5">
                <div class="card-body p-5 text-center"><div class="h3 fw-light mb-0">Vérification du mot de passe</div></div>
                <hr class="my-0" />
                <div class="card-body p-5">
                    <div class="text-center small text-muted mb-4">Merci de confirmer votre mot de passe avant de continuer</div>
                    <!-- Forgot password form-->
                    <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf
                        <!-- Form Group (email address)-->
                        <div class="mb-3">
                            <label class="text-gray-600 small" for="password">Mot de passe</label>
                            <input class="form-control form-control-solid" name="password" id="password" type="password" required autocomplete="current-password" />
                        </div>
                        <!-- Form Group (reset password button)    -->
                        <div class="d-flex align-items-center justify-content-between mb-0">
                            <a href="{{ redirect()->back()->getTargetUrl() }}">&larr; Retour</a>
                            <button type="submit" class="btn btn-primary">Valider</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
