<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <script src="https://cdn.tailwindcss.com"></script>
 <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
 <title>EventComm</title>

</head>
<body>
      @include('partials.nav')

      @yield('main')

      @include('partials.footer')

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
 </script>
</body>
</html>