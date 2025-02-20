@extends('layouts.master')

@section('main')
<!-- Register Form -->
<main class="mt-20">
    <div class="max-w-lg px-4 mx-auto">
        <div class="p-8 bg-white shadow-lg">
            <div class="mb-8 text-center">
                <h1 class="text-2xl font-bold text-gray-900">Créer un compte</h1>
                <p class="mt-2 text-gray-600">Rejoignez la communauté EventComm</p>
            </div>

            <!-- Formulaire d'inscription -->
            <form class="space-y-6" action="{{ route('register') }}" method="POST">
                @csrf

                <!-- Nom complet -->
                <div>
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-700">
                        Nom complet
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <i class="text-gray-400 fas fa-user"></i>
                        </div>
                        <input
                            type="text"
                            id="name"
                            name="name"
                            class="block w-full py-2 pl-10 pr-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500"
                            placeholder="Votre nom complet"
                            value="{{ old('name') }}"
                            required
                        >
                    </div>
                    @error('name')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Adresse email -->
                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-700">
                        Adresse email
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <i class="text-gray-400 fas fa-envelope"></i>
                        </div>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            class="block w-full py-2 pl-10 pr-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500"
                            placeholder="vous@exemple.com"
                            value="{{ old('email') }}"
                            required
                        >
                    </div>
                    @error('email')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Mot de passe -->
                <div>
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-700">
                        Mot de passe
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <i class="text-gray-400 fas fa-lock"></i>
                        </div>
                        <input
                            type="password"
                            id="password"
                            name="password"
                            class="block w-full py-2 pl-10 pr-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500"
                            placeholder="Minimum 8 caractères"
                            required
                        >
                    </div>
                    @error('password')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirmation du mot de passe -->
                <div>
                    <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-700">
                        Confirmer le mot de passe
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <i class="text-gray-400 fas fa-lock"></i>
                        </div>
                        <input
                            type="password"
                            id="password_confirmation"
                            name="password_confirmation"
                            class="block w-full py-2 pl-10 pr-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500"
                            placeholder="Confirmez votre mot de passe"
                            required
                        >
                    </div>
                </div>

                <!-- Bouton d'inscription -->
                <button
                    type="submit"
                    class="w-full px-4 py-2 text-white bg-red-600 rounded hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500"
                >
                    Créer mon compte
                </button>
            </form>

            <!-- Lien vers la connexion -->
            <div class="mt-6 text-center">
                <p class="text-sm text-gray-600">
                    Déjà un compte ?
                    <a href="{{ route('login') }}" class="font-medium text-red-600 hover:text-red-500">
                        Se connecter
                    </a>
                </p>
            </div>
        </div>
    </div>
</main>
@endsection