<x-guest-layout>
    <div class="row justify-content-center">
        <div class="col-xl-5 col-lg-6 col-md-8 col-sm-11">
            <!-- Social forgot password form-->
            <div class="card my-5">
                <div class="card-body p-5 text-center"><div class="h3 fw-light mb-0">Récupération de mot de passe</div></div>
                <hr class="my-0" />
                <div class="card-body p-5">
                    <div class="text-center small text-muted mb-4">Entrez votre adresse e-mail ci-dessous et nous y enverrons un line pour mettre à jour votre mot de passe.</div>
                    <!-- Forgot password form-->
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <!-- Form Group (email address)-->
                        <div class="mb-3">
                            <label class="text-gray-600 small" for="email">Adresse e-mail</label>
                            <input class="form-control form-control-solid" name="email" id="email" type="email" required autocomplete="username" value="{{ old('email') }}" />
                        </div>
                        <!-- Form Group (reset password button)    -->
                        <div class="d-flex align-items-center justify-content-between mb-0">
                            <a href="{{ route('login') }}">&larr; Je m'en souviens</a>
                            <button type="submit" class="btn btn-primary">Envoyer le lien</button>
                        </div>
                    </form>
                </div>
                <hr class="my-0" />
                <div class="card-body px-5 py-4">
                    <div class="small text-center">
                        Pas encore inscrit ?
                        <a href="{{ route('register') }}">Créer un compte</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
