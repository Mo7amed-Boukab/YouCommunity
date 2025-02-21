@extends('layouts.master')

@section('main')
    <div class="px-4 mx-auto mt-8 max-w-7xl">
        <div class="flex items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-900">Mes Événements</h1>
        </div>

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
                        <p class="mt-2 text-gray-600 line-clamp-3 overflow-wrap-normal">{{ $event->description }}</p>
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
                        <div class="flex gap-2 mt-4">
                            <button 
                                type="button"
                                onclick="openEditModal({{ $event->id }})"
                                class="flex-1 py-2 text-white bg-gray-600 rounded hover:bg-gray-700"
                            >
                                <i class="fas fa-edit"></i> Modifier
                            </button>
                            <button 
                                type="button"
                                onclick="openDeleteModal({{ $event->id }})"
                                class="flex-1 py-2 text-white bg-red-600 rounded hover:bg-red-700"
                            >
                                <i class="fas fa-trash"></i> Supprimer
                            </button>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-3 py-8 text-center">
                    <p class="text-gray-500">Vous n'avez pas encore créé d'événements.</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection

@section('modal')
    @foreach($events as $event)
    <div id="editEventModal_{{ $event->id }}" class="fixed inset-0 z-50 items-center justify-center hidden w-full min-h-screen overflow-y-auto bg-gray-600 bg-opacity-50 modal">
     <div class="relative w-full max-w-lg bg-white border rounded shadow-xl">
         <button class="absolute text-gray-500 closeEditModal hover:text-gray-700 top-4 right-4 focus:outline-none">
             <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
             </svg>
         </button>
    
         <div class="p-6">
             <h3 class="p-4 text-2xl font-semibold text-gray-900">Modifier l'événement</h3>
             <form action="{{ route('events.update', $event->id) }}" method="POST" enctype="multipart/form-data">
                 @csrf
                 @method('PUT')
                    <div class="space-y-4">
                        <div>
                            <input type="text" 
                                name="title"
                                value="{{ $event->title }}"
                                class="w-full p-2 border border-gray-300 rounded">
                        </div>
    
                        <div>
                            <textarea name="description" 
                                class="w-full p-2 border border-gray-300 rounded" 
                                rows="4">{{ $event->description }}</textarea>
                        </div>
    
                        <div>
                            <input type="text" 
                                name="adresse"
                                value="{{ $event->adresse }}"
                                class="w-full p-2 border border-gray-300 rounded">
                        </div>
    
                        <div>
                            <input type="datetime-local" 
                                name="date_time"
                                value="{{ $event->date_time }}"
                                class="w-full p-2 border border-gray-300 rounded">
                        </div>
    
                        <div>
                            <select name="category"
                                class="w-full p-2 border border-gray-300 rounded">
                                <option value="sport" {{ $event->category == 'sport' ? 'selected' : '' }}>Sport</option>
                                <option value="musique" {{ $event->category == 'musique' ? 'selected' : '' }}>Musique</option>
                                <option value="education" {{ $event->category == 'education' ? 'selected' : '' }}>Éducation</option>
                            </select>
                        </div>
    
                        <div>
                            <input type="number" 
                                name="max_participation"
                                value="{{ $event->max_participation }}"
                                min="1"
                                class="w-full p-2 border border-gray-300 rounded">
                        </div>
    
                        <div>
                            <div class="font-[sans-serif] max-w-md mx-auto">
                                <input type="file"
                                    name="image"
                                    accept="image/*"
                                    class="w-full text-sm font-semibold text-gray-400 bg-white border rounded cursor-pointer file:cursor-pointer file:border-0 file:py-3 file:px-4 file:mr-4 file:bg-gray-100 file:hover:bg-gray-200 file:text-gray-500">
                            </div>
                        </div>
                    </div>
    
                    <div class="flex justify-end gap-4 mt-6">
                        <button type="button" class="px-6 py-2 text-gray-700 bg-gray-100 rounded closeEditModal">
                            Annuler
                        </button>
                        <button type="submit" class="px-6 py-2 text-white bg-gray-700 rounded hover:bg-gray-800">
                            Enregistrer
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
       @include('deleteConfirmation')
       
    @endforeach
@endsection

@section('toast')
    @if (session('success'))
        <div id="toast-success" class="fixed bottom-4 right-4 flex items-center w-full max-w-xs p-4 mb-4 text-white rounded shadow animate-slide-up {{ 
            session('action') === 'update' ? 'bg-gray-700' : 'bg-red-500'
        }}">
            <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 rounded {{ 
                session('action') === 'update' ? 'bg-gray-800' : 'bg-red-600'
            }}">
                @if(session('action') === 'update')
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                    </svg>
                @else
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                    </svg>
                @endif
            </div>
            <div class="ml-3 text-sm font-normal">{{ session('success') }}</div>
            <button type="button" class="ml-auto -mx-1.5 -my-1.5 text-white rounded focus:ring-2 focus:ring-gray-300 p-1.5 hover:opacity-75 inline-flex h-8 w-8" onclick="closeToast()">
                <span class="sr-only">Fermer</span>
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>

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

    @endif
@endsection

@section('script')
<script>
    function openEditModal(id) {
        const modal = document.getElementById(`editEventModal_${id}`);
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function openDeleteModal(id) {
        const modal = document.getElementById(`deleteModal_${id}`);
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    document.querySelectorAll('.closeEditModal').forEach(button => {
        button.addEventListener('click', () => {
            const modal = button.closest('.modal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        });
    });

    document.querySelectorAll('.closeDeleteModal').forEach(button => {
        button.addEventListener('click', () => {
            const modal = button.closest('.modal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        });
    });

    function closeToast() {
                const toast = document.getElementById('toast-success');
                if (toast) {
                    toast.style.opacity = '0';
                    toast.style.transform = 'translateY(100%)';
                    toast.style.transition = 'opacity 0.3s ease-out, transform 0.3s ease-out';
                    setTimeout(() => toast.remove(), 300);
                }
            }

            setTimeout(() => {
                closeToast();
            }, 3000);
</script>
@endsection