
<footer class="py-12 mt-12 text-white bg-gray-800">
 <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
     <div class="grid grid-cols-1 gap-8 md:grid-cols-3">
         <div>
             <h3 class="mb-4 text-lg font-semibold">À propos</h3>
             <p class="text-gray-400">EventPlanner est une plateforme innovante pour la gestion des Evenements communautaires.</p>
         </div>
         <div>
             <h3 class="mb-4 text-lg font-semibold">Liens rapides</h3>
             <ul class="space-y-2 text-gray-400">
                 <li><a href="{{ route('home.index') }}" class="hover:text-white">Accueil</a></li>
                 <li><a href="{{ route('home.index') }}" class="hover:text-white">Evénements</a></li>
                 <li><a href="{{ route('register') }}" class="hover:text-white">inscription</a></li>
                 <li><a href="{{ route('login') }}" class="hover:text-white">Connexion</a></li>
             </ul>
         </div>
         <div>
             <h3 class="mb-4 text-lg font-semibold">Contact</h3>
             <p class="text-gray-400">Email: contact@EventPlanner.com</p>
             <p class="text-gray-400">Téléphone: +212 603 38 94 25</p>
         </div>
     </div>
     <div class="pt-8 mt-8 text-center text-gray-400 border-t border-gray-700">
         <p>&copy; 2025 EventPlanner. Tous droits réservés.</p>
     </div>
 </div>
</footer>