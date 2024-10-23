<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

  <!-- header -->
  <!-- Circle Effects -->
  <div class="fixed inset-0">
    <!-- Circle 1 (Top-left) -->
    <div class="w-[460px] h-[400px] bg-[#65c1d4] rounded-full absolute blur-[200px] top-0 left-0"></div>
    <!-- Circle 2 (Slightly lower) -->
    <div class="w-[400px] h-[350px] bg-indigo-400 rounded-full absolute blur-[180px] top-[20%] left-[20%]"></div>
    <!-- Circle 3 (Middle) -->
    <div class="w-[350px] h-[300px] bg-purple-500 rounded-full absolute blur-[160px] top-[50%] left-[50%]"></div>
    <!-- Circle 4 (Bottom-right) -->
    <div class="w-[300px] h-[250px] bg-yellow-300 rounded-full absolute blur-[140px] bottom-0 right-0"></div>
  </div>

  <div class="flex min-h-screen">
    @include('partials.sidebar')

    <!-- Main content -->
    <div class="flex-1 p-6">
      @yield('content')
    </div>

    @yield('scripts')

    <!-- footer -->
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>