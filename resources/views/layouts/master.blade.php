<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <script src="https://cdn.tailwindcss.com"></script>
 <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
 <title>EventPlanner</title>

</head>
<body>
      @include('partials.nav')

      @yield('main')

      @yield('modal')

      @yield('toast')

      @include('partials.footer')

   
      @yield('script')

</body>
</html>