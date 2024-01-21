<x-app-layout>
    <x-slot name="header">
        <x-profile-header />
    </x-slot>

    <div class="container-xl px-4 mt-4">
        <x-profile-nav />
        <div class="row">
            <div class="col-xl-8">
                <!-- Account details card-->
                <div class="card mb-4">
                    <div class="card-header">Mes informations</div>
                    <div class="card-body">
                        <form method="post" action="{{ route('admin.profile.update') }}">
                            @csrf
                            @method('patch')
                            <!-- Form Row-->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (first name)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="firstname">Prénom</label>
                                    <input class="form-control" id="firstname" name="firstname" type="text" value="{{ old('firstname', $user->firstname) }}" />
                                </div>
                                <!-- Form Group (last name)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="lastname">Nom de famille</label>
                                    <input class="form-control" id="lastname" name="lastname" type="text" value="{{ old('lastname', $user->lastname) }}" />
                                </div>
                            </div>
                            <!-- Form Group (email address)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="email">Adresse e-mail</label>
                                <input class="form-control" id="email" type="email" name="email" value="{{ old('email', $user->email) }}" />
                            </div>
                            <!-- Save changes button-->
                            <button class="btn btn-primary" type="submit">Sauvegarder</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <!-- Profile picture card-->
                <div class="card mb-4 mb-xl-0">
                    <div class="card-header">Photo</div>
                    <div class="card-body text-center">
                        <!-- Profile picture image-->
                        <img class="img-account-profile rounded-circle mb-2" src="{{ $user->gravatar() }}" alt="Gravatar" />
                        <div class="small font-italic text-muted mb-4">Modifier sur <a href="https://gravatar.com" target="_blank" rel="noopener">Gravatar</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
