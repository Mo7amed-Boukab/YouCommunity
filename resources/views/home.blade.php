@extends('layouts.master')

@section('main')

    <!-- Hero Section -->
      <div class="relative py-20 bg-gradient-to-b from-red-900 to-red-500">
       <div class="container px-4 mx-auto text-center">
           <h1 class="mb-4 text-3xl font-bold text-white">WE ARE EVENT PROFESSIONALS</h1>
           <p class="mb-8 text-lg text-white">Découvrez et rejoignez des événements passionnants près de chez vous</p>
           
           <!-- Search Bar-->
           <div class="flex justify-center max-w-2xl mx-auto mb-12">
               <div class="flex w-full gap-2">
                   <div class="flex-1 p-1 bg-white rounded shadow-lg">
                       <input type="text" placeholder="Rechercher un événement..." class="w-full px-4 py-2 focus:outline-none">
                   </div>
                   <button class="px-6 text-white bg-red-700 rounded shadow-lg hover:bg-red-600">
                       <i class="fas fa-search"></i> rechercher
                   </button>
               </div>
           </div>
       </div>
   </div>

    <!-- Events Section -->
    <div class="container px-12 py-12 mx-auto">
        <h2 class="mb-8 text-2xl font-bold text-gray-800">Événements à venir</h2>
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
            <!-- Event Card 1 -->
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
            <!-- Event Card 1 -->
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
            <!-- Event Card 1 -->
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

            
        </div>
    </div>

@endsection