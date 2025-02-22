@extends('layouts.master')

@section('main')
<div class="px-4 mx-auto mt-8 max-w-7xl">
    <div class="flex items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Mes Réservations</h1>
    </div>

    <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
        @forelse($reservations as $reservation)
            <div class="overflow-hidden bg-white rounded shadow-lg">
                <img 
                    src="{{ asset('storage/' . $reservation->event->image_path) }}" 
                    alt="{{ $reservation->event->title }}" 
                    class="object-cover w-full h-48"
                >
                <div class="p-4">
                    <div class="flex items-start justify-between">
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800">{{ $reservation->event->title }}</h3>
                            <p class="mt-1 text-gray-600">
                                <i class="fas fa-map-marker-alt"></i> {{ $reservation->event->adresse }}
                            </p>
                        </div>
                        <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded">
                            {{ $reservation->event->category }}
                        </span>
                    </div>
                    <p class="mt-2 text-gray-600">{{ $reservation->event->description }}</p>
                    <div class="flex items-center justify-between mt-4">
                        <div class="flex items-center space-x-2">
                            <i class="text-gray-400 fas fa-users"></i>
                            <span class="text-sm text-gray-600">
                                {{ $reservation->event->reservations->count() }}/{{ $reservation->event->max_participation }} participants
                            </span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <i class="text-gray-400 fas fa-calendar"></i>
                            <span class="text-sm text-gray-600">{{ $reservation->event->date_time }}</span>
                        </div>
                    </div>
                    
                    <form action="{{ route('reservations.destroy', $reservation->event->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-full py-2 mt-4 text-white bg-gray-600 rounded hover:bg-gray-700">
                            Annuler ma réservation
                        </button>
                    </form>
                </div>
            </div>
        @empty
            <div class="col-span-3 py-8 text-center">
                <p class="text-gray-500">Vous n'avez pas encore de réservations.</p> 
            </div>
        @endforelse
    </div>
</div>
@endsection

@section('toast')
    @if (session('success'))
        <div id="toast-success" class="fixed flex items-center w-full max-w-xs p-4 mb-4 text-white bg-green-600 rounded shadow bottom-4 right-4 animate-slide-up">
            <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 bg-green-700 rounded">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                </svg>
            </div>
            <div class="ml-3 text-sm font-normal">{{ session('success') }}</div>
            <button type="button" class="ml-auto -mx-1.5 -my-1.5 text-white rounded focus:ring-2 focus:ring-gray-300 p-1.5 hover:opacity-75 inline-flex h-8 w-8" onclick="closeToast('toast-success')">
                <span class="sr-only">Fermer</span>
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
    @endif

    @if (session('error'))
        <div id="toast-error" class="fixed flex items-center w-full max-w-xs p-4 mb-4 text-white bg-yellow-500 rounded shadow bottom-4 right-4 animate-slide-up">
            <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 bg-yellow-600 rounded">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                </svg>
            </div>
            <div class="ml-3 text-sm font-normal">{{ session('error') }}</div>
            <button type="button" class="ml-auto -mx-1.5 -my-1.5 text-white rounded focus:ring-2 focus:ring-gray-300 p-1.5 hover:opacity-75 inline-flex h-8 w-8" onclick="closeToast('toast-error')">
                <span class="sr-only">Fermer</span>
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
    @endif

    <style>
        @keyframes slide-up {
            from {
                transform: translateY(100%);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
        .animate-slide-up {
            animation: slide-up 0.3s ease-out;
        }
    </style>
@endsection

@section('script')
<script>
    function closeToast(id) {
        const toast = document.getElementById(id);
        if (toast) {
            toast.style.opacity = '0';
            toast.style.transform = 'translateY(100%)';
            toast.style.transition = 'opacity 0.3s ease-out, transform 0.3s ease-out';
            setTimeout(() => toast.remove(), 300);
        }
    }

    setTimeout(() => {
        const toasts = document.querySelectorAll('[id^="toast-"]');
        toasts.forEach(toast => {
            closeToast(toast.id);
        });
    }, 3000);
</script>
@endsection

