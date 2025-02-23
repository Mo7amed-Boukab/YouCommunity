@extends('layouts.master')

@section('main')

    <!-- Hero Section -->
      <div class="relative py-20 bg-gradient-to-b from-red-900 to-red-500">
       <div class="container px-4 mx-auto text-center">
           <h1 class="mb-4 text-3xl font-bold text-white">PLANIFICATEUR D'EVENEMENTS COMMUNAUTAIRES</h1>
           <p class="mb-8 text-lg text-white">Découvrez, organisez et rejoignez des événements qui rassemblent votre communauté.</p>
           
           <!-- Search Bar-->
           <div class="flex justify-center max-w-2xl mx-auto mb-12">
               <div class="flex w-full gap-2">
                   <div class="flex-1 p-1 bg-white rounded shadow-lg">
                    <form method="GET" action="{{ route('home.index') }}">
                         <input 
                               type="text"
                               name="search"
                               value="{{ request('search') }}" 
                               placeholder="Rechercher un événement..."
                               class="w-full px-4 py-2 focus:outline-none">
                     </div>             
                     <button 
                             type ="submit"
                             class="px-6 text-white bg-red-700 rounded shadow-lg hover:bg-red-600">
                             <i class="fas fa-search"></i> rechercher
                     </button>
                  </form>
               </div>
           </div>
       </div>
   </div>

   {{-- _______________________________________________  All Events ______________________________________________ --}}
   <div class="px-4 mx-auto mt-8 max-w-7xl">
    <div class="flex items-center justify-between mb-8">
     <h2 class="text-2xl font-bold text-gray-800">Événements à venir</h2>
      <div class="flex items-center space-x-4">
          <form method="GET" action="{{ route('home.index') }}"> 
            <select 
                    id="category" 
                    name="category" 
                    onchange="this.form.submit()"
                    class="block w-full px-3 py-2 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-red-500 focus:border-red-500">
                <option value="">Toutes les catégories</option>
                <option value="sport" {{ request('category') == 'sport' ? 'selected' : '' }}>Sport</option>
                <option value="musique" {{ request('category') == 'musique' ? 'selected' : '' }}>Musique</option>
                <option value="education" {{ request('category') == 'education' ? 'selected' : '' }}>Éducation</option>
            </select>
         </form>
      </div>
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
                    @auth                            
                       <div class="flex gap-2">
                        @if ($event->reservations()->where('user_id', auth()->id())->exists())                                
                            <form action="{{ route('reservations.destroy', $event->id) }}" method="POST" class="flex-1">                                    
                                @csrf                                    
                                @method('DELETE')                                    
                                <button class="w-full h-10 py-2 mt-4 text-white bg-yellow-500 rounded hover:bg-yellow-600">                                        
                                    Annuler la réservation                                    
                                </button>                                
                            </form>                            
                        @else                                 
                            <form action="{{ route('reservations.store', $event->id) }}" method="POST" class="flex-1">                                     
                                @csrf                                     
                                <button class="w-full h-10 py-2 mt-4 text-white bg-red-600 rounded hover:bg-red-700">                                         
                                    Participer                                     
                                </button>                                 
                            </form>                             
                        @endif
                        <button 
                            onclick="openCommentModal({{ $event->id }})" 
                            class="flex-1 h-10 py-2 mt-4 text-white bg-gray-600 rounded hover:bg-gray-700"
                        >
                          Commentaires
                        </button>
                    </div>                   
                    @endauth   
                    @guest  
                      <div class="flex gap-2">
                        @if ($event->reservations()->where('user_id', auth()->id())->exists())                                
                            <form action="{{ route('reservations.destroy', $event->id) }}" method="POST" class="flex-1">                                    
                                @csrf                                    
                                @method('DELETE')                                    
                                <button class="w-full h-10 py-2 mt-4 text-white bg-yellow-500 rounded hover:bg-yellow-600">                                        
                                    Annuler la réservation                                    
                                </button>                                
                            </form>                            
                        @else                                 
                            <form action="{{ route('reservations.store', $event->id) }}" method="POST" class="flex-1">                                     
                                @csrf                                     
                                <button class="w-full h-10 py-2 mt-4 text-white bg-red-600 rounded hover:bg-red-700">                                         
                                    Participer                                     
                                </button>                                 
                            </form>                             
                        @endif
                        <button 
                            onclick="openCommentModal({{ $event->id }})" 
                            class="flex-1 h-10 py-2 mt-4 text-white bg-gray-600 rounded hover:bg-gray-700"
                        >
                          Commentaires
                        </button>
                      </div>     
                    @endguest 
                </div>
            </div>
        @empty
            <div class="col-span-3 py-8 text-center">
                <p class="text-gray-500">Aucun événement existe.</p>
            </div>
            
        @endforelse        
    </div>
    <div class="mt-8">
        {{ $events->links()}}
    </div>

</div>

@endsection

@include('comments')

@section('script')
   <script>
          function openCommentModal(modalId) {
           document.getElementById(modalId).classList.remove('hidden');
          }

          function closeCommentModal(modalId) {
           document.getElementById(modalId).classList.add('hidden');
          }
</script>
@endsection