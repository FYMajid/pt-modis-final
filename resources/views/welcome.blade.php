<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Document</title>
</head>
<body>
<!-- resources/views/components/navbar.blade.php -->
<nav class="bg-black text-white py-3 px-4 md:px-8">
    <div class="container mx-auto flex justify-between items-center">
        <!-- Logo dan Nama Perusahaan -->
        <a href="/" class="flex items-center space-x-2">
            <img src="{{ asset('images/logo.png') }}" alt="PT Amanullah Modis Mandiri Logo" class="h-12">
           
        </a>
        
        <!-- Desktop Menu (hidden on mobile) -->
        <div class="hidden md:flex space-x-8 items-center">
            <a href="/" class="hover:text-gray-300">Home</a>
            <a href="/" class="text-yellow-500 font-medium hover:text-yellow-300">News!</a>
            <a href="/" class="hover:text-gray-300">About Us</a>
            <a href="/" class="hover:text-gray-300">Service</a>
            <a href="/" class="bg-yellow-500 hover:bg-yellow-600 text-black py-2 px-6 rounded-full">Contact Us</a>
        </div>
        
        <!-- Hamburger Menu Button (visible only on mobile) -->
        <div class="md:hidden">
            <button id="menu-toggle" class="focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>
    </div>
    
    <!-- Mobile Menu (hidden by default) -->
    <div id="mobile-menu" class="md:hidden hidden mt-4 flex flex-col space-y-4 pb-4 pt-2">
        <a href="/" class="block hover:text-gray-300 px-2">Home</a>
        <a href="/" class="block text-yellow-500 font-medium hover:text-yellow-300 px-2">News!</a>
        <a href="/" class="block hover:text-gray-300 px-2">About Us</a>
        <a href="/" class="block hover:text-gray-300 px-2">Service</a>
        <a href="/" class="block bg-yellow-500 hover:bg-yellow-600 text-black py-2 px-4 rounded-full w-max mx-2">Contact Us</a>
    </div>
</nav>

<!-- Script untuk Toggle Mobile Menu -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const menuToggle = document.getElementById('menu-toggle');
        const mobileMenu = document.getElementById('mobile-menu');
        
        menuToggle.addEventListener('click', function() {
            mobileMenu.classList.toggle('hidden');
        });
    });
</script>
</body>
</html>