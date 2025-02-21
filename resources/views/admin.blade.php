@extends('layouts.master')

@section('main')
   <div class="px-4 mx-auto mt-8 max-w-7xl">
    <div class="p-4 bg-white rounded shadow">
        <!-- Conteneur principal -->
        <div class="flex flex-col gap-4 lg:flex-row lg:items-center">
            <!-- Barre de recherche -->
            <div class="w-full lg:w-auto lg:flex-1">
                <div class="relative">
                    <input 
                        type="text" 
                        placeholder="Rechercher un événement..." 
                        class="w-full px-4 py-2 pr-10 border rounded focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-transparent"
                    >
                    <span class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-400 pointer-events-none">
                        <i class="fas fa-search"></i>
                    </span>
                </div>
            </div>

            <!-- Groupe des filtres -->
            <div class="flex gap-2">
                <!-- Filtre par date -->
                <div class="flex-1 lg:w-48 lg:flex-none">
                    <div class="relative">
                        <input 
                            type="date" 
                            class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-transparent"
                        >
                    </div>
                </div>

                <!-- Filtre par catégorie -->
                <div class="flex-1 lg:w-48 lg:flex-none">
                    <select class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-transparent">
                        <option value="">Catégorie</option>
                        <option value="sport">Sport</option>
                        <option value="musique">Musique</option>
                        <option value="education">Éducation</option>
                    </select>
                </div>
            </div>

            <!-- Groupe des boutons -->
            <div class="flex gap-2">
                <!-- Bouton de géolocalisation -->
                <button 
                    class="flex items-center justify-center flex-1 gap-2 px-4 py-2 text-gray-700 transition bg-gray-100 rounded lg:flex-none hover:bg-gray-200 group"
                >
                    <i class="text-red-500 fas fa-map-marker-alt group-hover:animate-bounce"></i>
                    <span>À proximité</span>
                </button>

                <!-- Bouton d'ajout d'événement -->
                <button 
                    id="addEventBtn" 
                    class="flex items-center justify-center flex-1 gap-2 px-4 py-2 text-white transition bg-red-600 rounded lg:flex-none hover:bg-red-700"
                >
                    <i class="fas fa-plus"></i>
                    <span>Ajouter un événement</span>
                </button>
            </div>
        </div>
    </div>
   </div>
   {{-- _______________________________________________  All Events ______________________________________________ --}}
   <div class="px-4 mx-auto mt-8 max-w-7xl">
       <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
           @forelse($events as $event)
               <div class="overflow-hidden bg-white rounded shadow-lg">
                   <img 
                       src="{{asset('storage/' . $event->image_path)}}" 
                       alt="{{ $event->title }}" 
                       class="object-cover w-full h-48"
                   >
                   <div class="p-4">
                       <div class="flex items-start justify-between">
                           <div>
                               <h3 class="text-xl font-semibold text-gray-800">{{ $event->title }}</h3>
                               <p class="mt-1 text-gray-600">
                                   <i class="fas fa-map-marker-alt"></i> {{ $event->adresse }}
                               </p>
                           </div>
                           <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded">{{ $event->category }}</span>
                       </div>
                       <p class="mt-2 text-gray-600">{{ $event->description }}</p>
                       <div class="flex items-center justify-between mt-4">
                           <div class="flex items-center space-x-2">
                               <i class="text-gray-400 fas fa-users"></i>
                               <span class="text-sm text-gray-600">0/{{ $event->max_participation }} participants</span>
                           </div>
                           <div class="flex items-center space-x-2">
                               <i class="text-gray-400 fas fa-calendar"></i>
                               <span class="text-sm text-gray-600">{{ $event->date_time }}</span>
                           </div>
                       </div>
                       <button class="w-full py-2 mt-4 text-white bg-red-600 rounded hover:bg-red-700">
                           Participer
                       </button>
                   </div>
               </div>
           @empty
               <div class="col-span-3 py-8 text-center">
                   <p class="text-gray-500">Aucun événement existe pour le moment.</p>
               </div>
           @endforelse
       </div>
   </div>
@endsection

@include('addEvent')

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
    const addEventBtn = document.getElementById('addEventBtn');
    const eventModal = document.getElementById('eventModal');
    const closeModal = document.querySelectorAll('.closeModal');

    addEventBtn.addEventListener('click', () => {
        eventModal.classList.remove('hidden');
        eventModal.classList.add('flex');
    });

    closeModal.forEach(btn => {
        btn.addEventListener('click', () => {
            eventModal.classList.add('hidden');
            eventModal.classList.remove('flex'); 
        });
    });

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
