{{-- @section('modal')
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
                        <div class="w-full">
                            <input 
                                type="file" 
                                name="image" 
                                accept="image/*"
                                class="w-full text-sm font-semibold text-gray-400 bg-white border rounded cursor-pointer file:cursor-pointer file:border-0 file:py-3 file:px-4 file:mr-4 file:bg-gray-100 file:hover:bg-gray-200 file:text-gray-500" 
                            />     
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
@endsection --}}
