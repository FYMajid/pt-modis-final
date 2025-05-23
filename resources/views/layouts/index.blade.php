<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Dynamic Title -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link  rel="icon" href="{{ asset('images/logoAbout.png') }}" type="image/png">

    <title>@yield('title', 'Dashboard Admin')</title>
    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/news-manager.js'])
    <!-- Trix Editor -->
<link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
<script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>

</head>
<body class="bg-gray-50 font-[DM Sans]">
    <!-- Header Section -->
    <div class="p-6 bg-white shadow-md">
        <div class="flex justify-between items-center">
            <!-- Title -->
            <h1 class="text-2xl font-bold">@yield('page-title', 'Dashboard Admin')</h1>
            <!-- Logout Form -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Logout</button>
            </form>
        </div>
    </div>

    <!-- Content Section -->
    <div class="p-6">
        @yield('content') 
    </div>
    @yield('scripts') 
</body>
</html>