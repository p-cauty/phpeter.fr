<x-guest-layout>
    <div class="row justify-content-center">
        <div class="col-xl-8 col-lg-9">
            <!-- Social registration form-->
            <div class="card my-5">
                <div class="card-body p-5 text-center">
                    <div class="h3 fw-light">Créer un compte</div>
                </div>
                <hr class="my-0" />
                <div class="card-body p-5">
                    <!-- Login form-->
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <!-- Form Row-->
                        <div class="row gx-3">
                            <div class="col-md-6">
                                <!-- Form Group (first name)-->
                                <div class="mb-3">
                                    <label class="text-gray-600 small" for="firstname">Prénom</label>
                                    <input class="form-control form-control-solid" name="firstname" id="firstname" type="text" required value="{{ old('firstname') }}" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <!-- Form Group (last name)-->
                                <div class="mb-3">
                                    <label class="text-gray-600 small" for="lastname">Nom de famille</label>
                                    <input class="form-control form-control-solid" name="lastname" id="lastname" type="text" required value="{{ old('firstname') }}" />
                                </div>
                            </div>
                        </div>
                        <!-- Form Group (email address)-->
                        <div class="mb-3">
                            <label class="text-gray-600 small" for="email">Adresse e-mail</label>
                            <input class="form-control form-control-solid" name="email" id="email" type="email" required value="{{ old('email') }}" />
                        </div>
                        <!-- Form Row-->
                        <div class="row gx-3">
                            <div class="col-md-6">
                                <!-- Form Group (choose password)-->
                                <div class="mb-3">
                                    <label class="text-gray-600 small" for="password">Mot de passe</label>
                                    <input class="form-control form-control-solid" name="password" id="password" type="password" required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <!-- Form Group (confirm password)-->
                                <div class="mb-3">
                                    <label class="text-gray-600 small" for="password_confirmation">Confirmation</label>
                                    <input class="form-control form-control-solid" name="password_confirmation" id="password_confirmation" type="password" required />
                                </div>
                            </div>
                        </div>
                        <!-- Form Group (form submission)-->
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="form-check">
                                <input class="form-check-input" name="terms" id="terms" type="checkbox" required />
                                <label class="form-check-label" for="terms">
                                    J'accepte les <a href="#!">Conditions Générales de Vente</a>.
                                </label>
                            </div>
                            <button type="submit" class="btn btn-primary">Créer un compte</button>
                        </div>
                    </form>
                </div>
                <hr class="my-0" />
                <div class="card-body px-5 py-4">
                    <div class="small text-center">
                        Déjà inscrit ?
                        <a href="{{ route('login') }}">Connexion</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
