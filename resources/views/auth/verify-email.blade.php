<x-guest-layout>
    <div class="row justify-content-center">
        <div class="col-xl-5 col-lg-6 col-md-8 col-sm-11">
            <!-- Social forgot password form-->
            <div class="card my-5">
                <div class="card-body p-5">
                    <div class="text-center mb-4">
                        Merci pour votre inscription. Avant de commencer, merci de vérifier votre adresse e-mail en
                        cliquant sur le lien que nous venons de vous envoyer.
                    </div>
                    <div class="text-center mb-4">
                        Si vous n'avez pas reçu l'e-mail, cliquez sur le bouton ci-dessous et nous vous en enverrons un
                        autre avec plaisir.
                    </div>
                    <!-- Forgot password form-->
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="{{ route('logout') }}">Déconnexion</a>
                        <form method="POST" class="d-flex justify-content-center align-items-center" action="{{ route('verification.send') }}">
                            @csrf
                            <button type="submit" class="btn btn-primary">Renvoyer l'e-mail de confirmation</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>

