@extends('layouts.master')

@section('main')
<!-- Login Form -->
<main class="mt-20">
    <div class="max-w-lg px-4 mx-auto">
        <div class="p-8 bg-white shadow-lg">
            <div class="mb-8 text-center">
                <h1 class="text-2xl font-bold text-gray-900">Connexion</h1>
                <p class="mt-2 text-gray-600">Accédez à votre compte</p>
            </div>

            <!-- Formulaire de connexion -->
            <form class="space-y-6" action="{{ route('login') }}" method="POST">
                @csrf

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
                            placeholder="Votre mot de passe"
                            required
                        >
                    </div>
                    @error('password')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Se souvenir de moi -->
                <div class="flex items-center justify-between">
                    <label class="flex items-center">
                        <input type="checkbox" name="remember" class="w-4 h-4 text-red-600 border-gray-300 rounded focus:ring-red-500">
                        <span class="ml-2 text-sm text-gray-600">Se souvenir de moi</span>
                    </label>
                    <a href="{{ route('password.request') }}" class="text-sm font-medium text-red-600 hover:text-red-500">
                        Mot de passe oublié ?
                    </a>
                </div>

                <!-- Bouton de connexion -->
                <button
                    type="submit"
                    class="w-full px-4 py-2 text-white bg-red-600 rounded hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500"
                >
                    Connexion
                </button>
            </form>

            <!-- Lien vers l'inscription -->
            <div class="mt-6 text-center">
                <p class="text-sm text-gray-600">
                    Pas encore de compte ?
                    <a href="{{ route('register') }}" class="font-medium text-red-600 hover:text-red-500">
                        Créer un compte
                    </a>
                </p>
            </div>
        </div>
    </div>
</main>
@endsection
