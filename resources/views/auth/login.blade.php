<x-guest-layout>
    <div class="row justify-content-center">
        <div class="col-xl-5 col-lg-6 col-md-8 col-sm-11">
            <!-- Social login form-->
            <div class="card my-5">
                <div class="card-body p-5 text-center">
                    <div class="h3 fw-light">Connexion à votre compte</div>
                </div>
                <hr class="my-0" />
                <div class="card-body p-5">
                    <!-- Login form-->
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <!-- Form Group (email address)-->
                        <div class="mb-3">
                            <label class="text-gray-600 small" for="email">Adresse e-mail</label>
                            <input class="form-control form-control-solid" id="email" name="email" type="email" required autofocus autocomplete="username" value="{{ old('email') }}" />
                        </div>
                        <!-- Form Group (password)-->
                        <div class="mb-3">
                            <label class="text-gray-600 small" for="password">Mot de passe</label>
                            <input class="form-control form-control-solid" id="password" name="password" type="password" required autocomplete="current-password" />
                        </div>
                        <!-- Form Group (forgot password link)-->
                        <div class="mb-3">
                            <a class="small" href="{{ route('password.request') }}">Mot de passe oublié ?</a>
                        </div>
                        <!-- Form Group (login box)-->
                        <div class="d-flex align-items-center justify-content-between mb-0">
                            <div class="form-check">
                                <input class="form-check-input" id="remember_me" name="remember" type="checkbox" />
                                <label class="form-check-label" for="remember_me">Se souvenir de moi</label>
                            </div>
                            <button type="submit" class="btn btn-primary">Connexion</button>
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
