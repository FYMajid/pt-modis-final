<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>{{$title}}</title>
</head>
<body class="h-full">
    <!-- navbar -->
     <x-navbar></x-navbar>

     <!-- kontent utama -->
     <main>
     @yield('content')   
     </main

     <!-- footer -->
     <x-footer></x-footer>
</body>
</html>