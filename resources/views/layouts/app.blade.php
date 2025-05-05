<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300..700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300..700&family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    

    <link  rel="icon" href="{{ asset('images/logoAbout.png') }}" type="image/png">
    @vite('resources/css/app.css')
    <title>{{ config('app.name', 'Laravel') }}</title>
    
    @yield('style')
</head>
<body class="h-full bg-[#212121]">
    <!-- navbar -->
     <x-navbar></x-navbar>

     <!-- kontent utama -->
     <main>
     @yield('content')   
     </main

     <!-- footer -->
     <x-footer></x-footer>

     @yield('scripts')
</body>
</html>