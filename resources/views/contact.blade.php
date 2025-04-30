@extends('layouts.app')

@section('content')
<section>
<div class="w-full bg-cover bg-center bg-no-repeat h-[300px] md:h-[400px] lg:h-[500px] relative" 
         style="background-image: url('https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.3/default-skin/default-skin.png'); background-color: rgba(0, 0, 0, 0.6); background-blend-mode: overlay;">
        
        <div class="container mx-auto px-6 md:px-12 py-12 md:py-16">
            <!-- Get In Touch Section -->
            <div class="flex flex-col md:flex-row justify-between">
                <!-- Left Column -->
                <div class="w-full md:w-1/2 text-white">
                    <h1 class="text-4xl md:text-5xl font-bold mb-8">Get In <span class="text-amber-400">Touch</span></h1>
                    
                    <!-- WhatsApp Button -->
                    <a href="#" class="inline-flex items-center bg-amber-400 hover:bg-amber-500 text-black font-semibold py-2 px-6 rounded-full mb-8">
                        <i class="fab fa-whatsapp mr-2"></i> Connected With Us
                    </a>
                    
                    <!-- Contact Information -->
                    <div class="mb-6">
                        <div class="flex items-center mb-3">
                            <span class="inline-block w-6 text-center"><i class="fas fa-phone"></i></span>
                            <span class="ml-2">021-7538402 | 021-7539180</span>
                        </div>
                        <div class="flex items-center mb-6">
                            <span class="inline-block w-6 text-center"><i class="fas fa-envelope"></i></span>
                            <span class="ml-2">modiscenter@pt-modis.com</span>
                        </div>
                    </div>
                    
                    <!-- Social Media Icons -->
                    <div class="flex space-x-5 mb-8">
                        <a href="#" class="text-white hover:text-amber-400 transition-colors">
                            <i class="fab fa-instagram text-2xl"></i>
                        </a>
                        <a href="#" class="text-white hover:text-amber-400 transition-colors">
                            <i class="fab fa-tiktok text-2xl"></i>
                        </a>
                        <a href="#" class="text-white hover:text-amber-400 transition-colors">
                            <i class="fab fa-youtube text-2xl"></i>
                        </a>
                        <a href="#" class="text-white hover:text-amber-400 transition-colors">
                            <i class="fab fa-linkedin text-2xl"></i>
                        </a>
                        <a href="#" class="text-white hover:text-amber-400 transition-colors">
                            <i class="fas fa-globe text-2xl"></i>
                        </a>
                        <a href="#" class="text-white hover:text-amber-400 transition-colors">
                            <span class="font-bold text-xl">UMK</span>
                        </a>
                    </div>
                </div>
                
                <!-- Right Column -->
                <div class="w-full md:w-1/2 text-white mt-8 md:mt-0">
                    <!-- Office Address -->
                    <div class="mb-8">
                        <h3 class="text-xl font-bold mb-2">Office</h3>
                        <p class="leading-relaxed">
                            Jl. Harsono RM No. 41, Kel. Ragunan,<br>
                            Kec. Pasar Minggu, Kota Jakarta<br>
                            Selatan, DKI Jakarta, 12550, Indonesia
                        </p>
                    </div>
                    
                    <!-- Workshop Office -->
                    <div class="mb-8">
                        <h3 class="text-xl font-bold mb-2">Workshop Office</h3>
                        <p class="leading-relaxed">
                            Jl. Krukut Raya No.1, Kel. Krukut,<br>
                            Kec.Limo, Kota Depok, Jawa Barat,<br>
                            16514, Indonesia
                        </p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Google Maps Widget -->
        <div class="absolute right-8 top-1/2 transform -translate-y-1/2 hidden md:block">
            <div class="bg-white rounded-lg shadow-xl w-64 h-64 overflow-hidden">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.6867949550115!2d106.81755897499103!3d-6.3048185936843995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69edfdd0604549%3A0x4f8c16d25a0d4fcf!2sPT%20Amanullah%20Modis!5e0!3m2!1sid!2sid!4v1745604881726!5m2!1sid!2sid" 
                    width="100%" 
                    height="100%" 
                    style="border:0;" 
                    allowfullscreen="" 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </div>
    
    <!-- Full Width Map For Mobile -->
    <div class="md:hidden w-full h-64">
        <iframe 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.6867949550115!2d106.81755897499103!3d-6.3048185936843995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69edfdd0604549%3A0x4f8c16d25a0d4fcf!2sPT%20Amanullah%20Modis!5e0!3m2!1sid!2sid!4v1745604881726!5m2!1sid!2sid" 
            width="100%" 
            height="100%" 
            style="border:0;" 
            allowfullscreen="" 
            loading="lazy" 
            referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </div>
</section>
@endsection