@foreach($events as $event)
<div id="{{ $event->id }}" class="fixed inset-0 z-50 flex items-center justify-center hidden w-full min-h-screen bg-gray-600 bg-opacity-50 modal">
 <div class="relative w-full max-w-lg bg-white border rounded shadow-xl">
     <button 
         onclick="closeCommentModal('{{ $event->id }}')"
         class="absolute text-gray-500 hover:text-gray-700 top-4 right-4 focus:outline-none"
     >
         <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
         </svg>
     </button>

     <div class="p-6">
         <h3 class="mb-4 text-xl font-semibold text-gray-900">Commentaires - {{ $event->title }}</h3>
         
         <!-- display all comments -->
         <div class="mb-6 overflow-y-auto max-h-60">
             @foreach($event->comments()->with('user')->latest()->get() as $comment)
                 <div class="p-3 mb-2 rounded bg-gray-50">
                     <div class="flex items-start justify-between">
                         <div>
                             <p class="font-semibold">{{ $comment->user->name }}</p>
                             <p class="text-gray-600">{{ $comment->content }}</p>
                         </div>
                         <span class="text-sm text-gray-400">
                             {{ $comment->created_at->format('d/m/Y') }}
                         </span>
                     </div>
                 </div>
             @endforeach
         </div>

         <!-- add comment -->
         <form action="{{ route('comments.store', $event->id) }}" method="POST">
             @csrf
             <textarea 
                 name="content" 
                 class="w-full p-2 mb-4 border rounded focus:outline-none focus:ring-2 focus:ring-gray-500" 
                 rows="3" 
                 placeholder="Votre commentaire..."
                 required
             ></textarea>
             <div class="flex ">
                 <button type="submit" class="px-4 py-2 text-white bg-gray-600 rounded hover:bg-gray-700">
                     Ajouter commentaire
                 </button>
             </div>
         </form>
     </div>
 </div>
</div>

@endforeach
