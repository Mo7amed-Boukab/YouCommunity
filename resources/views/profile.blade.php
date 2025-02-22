@extends('layouts.master')

@section('main')
<div class="py-8">
    <div class="mx-auto space-y-6 max-w-7xl sm:px-6 lg:px-8">
        <!-- Section Informations du profil -->
        <div class="p-4 bg-white shadow sm:p-6 sm:rounded">
            <div class="max-w-xl">
                <h2 class="text-lg font-bold text-gray-900">
                    Informations du profil
                </h2>
                <p class="mt-1 text-sm text-gray-600">
                    Mettez à jour les informations de votre compte et votre adresse e-mail.
                </p>
            </div>

            <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-4">
                @csrf
                @method('patch')

                <div class="space-y-1">
                    <label for="name" class="text-sm font-medium text-gray-700">Nom</label>
                    <input type="text" name="name" id="name" 
                        value="{{ old('name', $user->name) }}"
                        class="block w-full px-3 py-2 border-gray-300 rounded shadow-sm focus:border-red-500 focus:ring-red-500"
                    >
                    @error('name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-1">
                    <label for="email" class="text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email" 
                        value="{{ old('email', $user->email) }}"
                        class="block w-full px-3 py-2 border-gray-300 rounded shadow-sm focus:border-red-500 focus:ring-red-500"
                    >
                    @error('email')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center gap-4 pt-2">
                    <button type="submit"
                        class="px-4 py-2 text-sm font-semibold text-white transition bg-red-600 rounded hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                        Sauvegarder
                    </button>
                </div>
            </form>
        </div>

        <!-- Section Mot de passe -->
        <div class="p-4 bg-white shadow sm:p-6 sm:rounded">
            <div class="max-w-xl">
                <h2 class="text-lg font-bold text-gray-900">
                    Mettre à jour le mot de passe
                </h2>
                <p class="mt-1 text-sm text-gray-600">
                    Assurez-vous que votre compte utilise un mot de passe long et aléatoire pour rester sécurisé.
                </p>
            </div>

            <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-4">
                @csrf
                @method('put')

                <div class="space-y-1">
                    <label for="current_password" class="text-sm font-medium text-gray-700">Mot de passe actuel</label>
                    <input type="password" name="current_password" id="current_password"
                        class="block w-full px-3 py-2 border-gray-300 rounded shadow-sm focus:border-red-500 focus:ring-red-500"
                    >
                    @error('current_password')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-1">
                    <label for="password" class="text-sm font-medium text-gray-700">Nouveau mot de passe</label>
                    <input type="password" name="password" id="password"
                        class="block w-full px-3 py-2 border-gray-300 rounded shadow-sm focus:border-red-500 focus:ring-red-500"
                    >
                    @error('password')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-1">
                    <label for="password_confirmation" class="text-sm font-medium text-gray-700">Confirmer le mot de passe</label>
                    <input type="password" name="password_confirmation" id="password_confirmation"
                        class="block w-full px-3 py-2 border-gray-300 rounded shadow-sm focus:border-red-500 focus:ring-red-500"
                    >
                </div>

                <div class="flex items-center gap-4 pt-2">
                    <button type="submit"
                        class="px-4 py-2 text-sm font-semibold text-white transition bg-red-600 rounded hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                        Sauvegarder
                    </button>
                </div>
            </form>
        </div>

        <!-- Section Suppression du compte -->
        <div class="p-4 bg-white shadow sm:p-6 sm:rounded">
            <div class="max-w-xl">
                <h2 class="text-lg font-bold text-gray-900">
                    Supprimer le compte
                </h2>
                <p class="mt-1 text-sm text-gray-600">
                    Une fois votre compte supprimé, toutes ses ressources et données seront définitivement effacées.
                </p>

                <form method="post" action="{{ route('profile.destroy') }}" class="mt-4">
                    @csrf
                    @method('delete')

                    <button type="submit" 
                        onclick="return confirm('Êtes-vous sûr de vouloir supprimer votre compte ?')"
                        class="px-4 py-2 text-sm font-semibold text-white transition bg-red-600 rounded hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                        Supprimer le compte
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@if (session('status') === 'profile-updated')
    <div id="toast-success" class="fixed flex items-center w-full max-w-xs p-4 mb-4 text-white bg-green-600 rounded shadow bottom-4 right-4 animate-slide-up">
        <div class="ml-3 text-sm font-normal">Profil mis à jour avec succès</div>
    </div>
@endif
@endsection

