
@extends('layouts.master')

@section('main')
    <!-- Filtres -->
<!-- Filtres -->
<div class="px-4 mx-auto mt-8 max-w-7xl">
 <div class="p-4 bg-white rounded shadow">
     <div class="flex flex-col gap-4 md:flex-row md:items-center">
         <!-- Barre de recherche -->
         <div class="flex-1">
             <div class="relative">
                 <input 
                     type="text" 
                     placeholder="Rechercher un événement..." 
                     class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-transparent"
                 >
                 <span class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-400">
                     <i class="fas fa-search"></i>
                 </span>
             </div>
         </div>
         
         <!-- Bouton de géolocalisation -->
         <button 
             class="flex items-center gap-2 px-4 py-2 text-gray-700 bg-gray-100 rounded hover:bg-gray-200"
         >
             <i class="fas fa-map-marker-alt"></i>
             À proximité
         </button>
         
         <!-- Bouton d'ajout d'événement -->
         <button 
             id="addEventBtn" class="flex items-center gap-2 px-4 py-2 text-white bg-red-600 rounded hover:bg-red-700">
             <i class="fas fa-plus"></i>
             Ajouter un événement
         </button>
     </div>
 </div>
</div>

    <!-- Liste des événements -->
    <div class="px-4 mx-auto mt-8 max-w-7xl">
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
            <!-- Carte d'événement -->
            <div class="overflow-hidden bg-white rounded shadow-lg">
                <img src="/api/placeholder/400/200" alt="Event" class="object-cover w-full h-48">
                <div class="p-4">
                    <div class="flex items-start justify-between">
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800">Festival de Musique</h3>
                            <p class="mt-1 text-gray-600">
                                <i class="fas fa-map-marker-alt"></i> Paris, France
                            </p>
                        </div>
                        <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded">Musique</span>
                    </div>
                    <p class="mt-2 text-gray-600">Un festival unique regroupant les meilleurs artistes locaux.</p>
                    <div class="flex items-center justify-between mt-4">
                        <div class="flex items-center space-x-2">
                            <i class="text-gray-400 fas fa-users"></i>
                            <span class="text-sm text-gray-600">12/50 participants</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <i class="text-gray-400 fas fa-calendar"></i>
                            <span class="text-sm text-gray-600">25 Mars 2025</span>
                        </div>
                    </div>
                    <button class="w-full py-2 mt-4 text-white bg-red-600 rounded hover:bg-red-700">
                        Participer
                    </button>
                </div>
            </div>
            <!-- Répéter pour d'autres événements -->
        </div>
    </div>

 <!-- Modal de création d'événement -->
<div id="eventModal" class="fixed inset-0 z-50 items-center justify-center hidden w-full min-h-screen px-4 overflow-y-auto bg-gray-600 bg-opacity-50">
 <div class="relative w-full max-w-lg bg-white border rounded shadow-xl">
     <button 
         class="absolute text-gray-500 closeModal hover:text-gray-700 top-4 right-4 focus:outline-none"
         aria-label="Fermer"
     >
         <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
         </svg>
     </button>

     <div class="p-6">
         <h3 class="text-2xl font-semibold text-gray-900">Ajouter un événement</h3>
         <form class="mt-6">
             <div class="space-y-4">
                 <!-- Titre -->
                 <div>
                     <input 
                         type="text" 
                         id="eventTitle"
                         placeholder="Donnez un titre à votre événement" 
                         class="w-full p-2 border border-gray-300 rounded"
                     >
                 </div>

                 <!-- Description -->
                 <div>
                     <textarea 
                         id="eventDescription"
                         placeholder="Décrivez votre événement" 
                         class="w-full p-2 border border-gray-300 rounded" 
                         rows="4"
                     ></textarea>
                 </div>

                 <!-- Lieu -->
                 <div>
                     <input 
                         type="text" 
                         id="eventLocation"
                         placeholder="Où aura lieu l'événement ?" 
                         class="w-full p-2 border border-gray-300 rounded"
                     >
                 </div>

                 <!-- Date et heure -->
                 <div>
                     <input 
                         type="datetime-local" 
                         id="eventDateTime"
                         class="w-full p-2 border border-gray-300 rounded"
                     >
                 </div>

                 <!-- Catégorie -->
                 <div>
                     <select 
                         id="eventCategory"
                         class="w-full p-2 border border-gray-300 rounded"
                     >
                         <option value="">Sélectionner une catégorie</option>
                         <option value="sport">Sport</option>
                         <option value="musique">Musique</option>
                         <option value="education">Éducation</option>
                         <option value="culture">Culture</option>
                         <option value="loisirs">Loisirs</option>
                     </select>
                 </div>

                 <!-- Nombre max de participants -->
                 <div>
                     <input 
                         type="number" 
                         id="eventMaxParticipants"
                         placeholder="Nombre de places disponibles" 
                         min="1"
                         class="w-full p-2 border border-gray-300 rounded"
                     >
                 </div>
             </div>

             <!-- Boutons d'action -->
             <div class="flex justify-end gap-4 mt-6">
                 <button 
                     type="button" 
                     class="px-6 py-2 text-gray-700 bg-gray-100 rounded closeModal"
                 >
                     Annuler
                 </button>
                 <button 
                     type="submit" 
                     class="px-6 py-2 text-white bg-red-600 rounded hover:bg-red-700"
                 >
                     Enregistrer
                 </button>
             </div>
         </form>
     </div>
 </div>
</div>
@endsection
