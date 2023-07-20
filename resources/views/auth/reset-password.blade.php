<x-guest-layout>
    <div class="row justify-content-center">
        <div class="col-xl-5 col-lg-6 col-md-8 col-sm-11">
            <!-- Social forgot password form-->
            <div class="card my-5">
                <div class="card-body p-5 text-center"><div class="h3 fw-light mb-0">Réinitialiser votre mot de passe</div></div>
                <hr class="my-0" />
                <div class="card-body p-5">
                    <div class="text-center small text-muted mb-4">Choisissez un nouveau mot de passe, vous pourrez ensuite l'utiliser pour vous connecter.</div>
                    <!-- Forgot password form-->
                    <form method="POST" action="{{ route('password.store') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $request->route('token') }}">
                        <!-- Form Group (email address)-->
                        <div class="mb-3">
                            <label class="text-gray-600 small" for="email">Adresse e-mail</label>
                            <input class="form-control form-control-solid" name="email" id="email" type="email" value="{{ old('email', $request->email) }}" required />
                        </div>
                        <div class="mb-3">
                            <label class="text-gray-600 small" for="password">Nouveau mot de passe</label>
                            <input class="form-control form-control-solid" name="password" id="password" type="password" required />
                        </div>
                        <div class="mb-3">
                            <label class="text-gray-600 small" for="password_confirmation">Confirmation du mot de passe</label>
                            <input class="form-control form-control-solid" name="password_confirmation" id="password_confirmation" type="password" required />
                        </div>
                        <!-- Form Group (reset password button)    -->
                        <div class="d-flex align-items-center justify-content-between mb-0">
                            <a href="{{ route('login') }}">&larr; Je m'en souviens</a>
                            <button type="submit" class="btn btn-primary">Réinitialiser</button>
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
