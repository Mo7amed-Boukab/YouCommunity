<nav class="bg-white shadow-md">
  <div class="px-4 mx-auto max-w-7xl">
      <div class="flex items-center justify-between h-16">
       
          <div class="flex items-center">
              <a href="/EventComm" class="flex items-center space-x-2">
                  <i class="text-2xl text-red-600 fas fa-calendar-alt"></i>
                  <span class="text-xl font-bold text-gray-800">EventComm</span>
              </a>
          </div>

          <!-- Desktop -->
          <div class="items-center hidden space-x-6 md:flex">
              @auth
                  <a href="{{ route('admin.index') }}" class="text-gray-600 hover:text-red-600">Accueil</a>
                  <a href="{{ route('admin.events') }}" class="text-gray-600 hover:text-red-600">Mes événements</a>
                  <a href="{{ route('reservations.index') }}" class="text-gray-600 hover:text-red-600">Mes Réservations</a>
                  <a href="" class="text-gray-600 hover:text-red-600">Profile</a>
                  <form method="POST" action="{{ route('logout') }}" class="inline">
                      @csrf
                      <button type="submit" class="px-4 py-2 text-white bg-red-600 rounded hover:bg-red-700">
                          Déconnexion
                      </button>
                  </form>
              @endauth

              @guest
                  <a href="{{ route('login') }}" class="text-gray-600 hover:text-red-600">Connexion</a>
                  <a href="{{ route('register') }}" class="px-4 py-2 text-white bg-red-600 rounded hover:bg-red-700">
                      Inscription
                  </a>
              @endguest
          </div>

          <!-- side bar Btn -->
          <button id="menu-toggle" class="block text-gray-600 md:hidden hover:text-red-600">
              <i class="text-2xl fas fa-bars"></i>
          </button>
      </div>
  </div>

  <!-- Sidebar -->
  <div id="mobile-menu" class="fixed inset-0 hidden bg-gray-900 bg-opacity-75">
      <div class="absolute top-0 right-0 w-64 h-full p-5 bg-white shadow-lg">
       {{-- Close btn --}}
          <button id="close-menu" class="absolute text-gray-600 top-2 right-4 hover:text-red-600">
              <i class="text-2xl fas fa-times"></i>
          </button>

          <div class="mt-10 space-y-4">
              @auth
                  <a href="{{ route('admin.index') }}" class= "block text-gray-600 hover:text-red-600">Accueil</a>
                  <a href="{{ route('admin.events') }}" class="block text-gray-600 hover:text-red-600">Mes événements</a>
                  <a href="{{ route('reservations.index') }}" class="block text-gray-600 hover:text-red-600">Mes Réservations</a>
                  <a href="" class="block text-gray-600 hover:text-red-600">Profile</a>
                  <form method="POST" action="{{ route('logout') }}">
                      @csrf
                      <button type="submit" class="block w-full px-4 py-2 text-white bg-red-600 rounded hover:bg-red-700">
                          Déconnexion
                      </button>
                  </form>
              @endauth

              @guest
                  <a href="{{ route('login') }}" class="block text-gray-600 hover:text-red-600">Connexion</a>
                  <a href="{{ route('register') }}" class="block w-full px-4 py-2 text-white bg-red-600 rounded hover:bg-red-700">
                      Inscription
                  </a>
              @endguest
          </div>
      </div>
  </div>
</nav>

<script>
         document.getElementById('menu-toggle').addEventListener('click', function () {
             document.getElementById('mobile-menu').classList.remove('hidden');
         });

         document.getElementById('close-menu').addEventListener('click', function () {
             document.getElementById('mobile-menu').classList.add('hidden');
         });
</script>