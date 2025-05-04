@section('style')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Fredoka:wght@300..700&display=swap');
    
</style>
@endsection
<nav class="bg-[#181818]/[.90] text-white py-4 px-6 md:px-12 fixed top-0 left-0 w-full z-50 backdrop-blur-sm shadow-md">

    <div class="container mx-auto flex justify-between items-center">
        <!-- Logo dan Nama Perusahaan -->
        <a href="/" class="flex items-center space-x-2">
            <img src="{{ asset('images/logo.png') }}" alt="PT Amanullah Modis Mandiri Logo" class="h-12">
           
        </a>
        
        <!-- Desktop Menu (hidden on mobile) -->
        <div class="hidden md:flex space-x-8 items-center">
            <a href="/" class="hover:text-gray-300">Home</a>
            <a href="/news" class="text-yellow-500 news-title hover:text-yellow-300">News!</a>
            <a href="/about" class="hover:text-gray-300">About Us</a>
            <a href="/service" class="hover:text-gray-300">Service</a>
            <a href="/career" class="hover:text-gray-300">Career</a>
            <a href="/contact" class="bg-gradient-to-br from-[#ECC543] to-[#F3DB9F] hover:bg-yellow-600 text-black py-2 px-6 rounded-full">Contact Us</a>
        </div>
        
        <!-- Hamburger Menu Button (visible only on mobile) -->
        <div class="md:hidden">
            <button id="menu-toggle" class="focus:outline-none cursor-pointer">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>
    </div>
    
    <!-- Mobile Menu (hidden by default) -->
    <div id="mobile-menu" class="md:hidden hidden mt-4 flex flex-col space-y-4 pb-4 pt-2">
        <a href="/" class="block hover:text-gray-300 px-2">Home</a>
        <a href="/news" class="fredoka-one block text-yellow-500 hover:text-yellow-300 px-2">News!</a>
        <a href="/about" class="block hover:text-gray-300 px-2">About Us</a>
        <a href="/service" class="block hover:text-gray-300 px-2">Service</a>
        <a href="/career" class="block hover:text-gray-300 px-2">Career</a>
        <a href="/contact" class="block bg-gradient-to-br from-[#ECC543] to-[#F3DB9F] hover:bg-yellow-600 text-black py-2 px-4 rounded-full w-max mx-2">Contact Us</a>
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