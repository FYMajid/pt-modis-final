@extends('layouts.app')

@section('content')
   <!-- Hero Section -->
    <section>
   <div class="relative h-screen bg-gray-900 overflow-hidden">
        <!-- Background image dengan opacity -->
        <div class="absolute inset-0 bg-black opacity-90">
            <!-- Disini bisa ditambahkan background image jika diperlukan -->
            <img src="{{ asset('images/banner.jpg') }}" alt="Background" class="w-full h-full object-cover">
        </div>

        <!-- Navigation arrows -->
        <div class="absolute inset-x-0 top-1/2 flex justify-between items-center px-4 md:px-10 z-20 transform -translate-y-1/2">
            <button class="text-yellow-500 hover:text-yellow-400 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 md:h-12 md:w-12" fill="none" viewBox="0 0 24 24" stroke="url(#gradient1)">
                  <defs>
                    <linearGradient id="gradient1" x1="0%" y1="0%" x2="100%" y2="100%">
                      <stop offset="0%" stop-color="#C9B172" />
                      <stop offset="100%" stop-color="#ECC543" />
                    </linearGradient>
                  </defs>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>
            <button class="text-yellow-500 hover:text-yellow-400 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 md:h-12 md:w-12" fill="none" viewBox="0 0 24 24" stroke="url(#gradient1)">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>
        </div>

        <!-- Main Content -->
        <div class="relative z-10 flex flex-col items-center justify-center h-full px-4 md:px-8">
            <div class="text-center max-w-4xl mx-auto">
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold bg-gradient-to-br from-[#C9B172] to-[#F3DB9F] bg-clip-text text-transparent mb-6">
                    PT Amanullah Modis Mandiri
                </h1>
                <p class="text-white text-sm md:text-base lg:text-lg mb-10 max-w-3xl mx-auto leading-relaxed">
                    Spesialis Kontraktor Mekanikal, Elektrikal, Plumbing, HVAC Yang Telah Memiliki Beragam 
                    Pengalaman Selama Paket Pekerjaan Mekanikal & Elektrikal Di Berbagai Jenis Proyek Gedung 
                    Serta Industri Antara Lain Mall, Apartemen, Gedung Kantor, Rumah Sakit, Pabrik & Gedung Hotel
                </p>
                
                <button class="bg-gradient-to-br from-[#ECC543] to-[#F3DB9F] hover:bg-yellow-600 text-gray-900 font-medium px-8 py-3 rounded-full transition duration-300">
                    Discover our Services
                </button>
                
                <!-- Navigation dots -->
                <div class="flex justify-center mt-12">
                    <div class="w-2 h-2 rounded-full bg-yellow-500 mx-1"></div>
                    <div class="w-2 h-2 rounded-full bg-white mx-1"></div>
                    <div class="w-2 h-2 rounded-full bg-white mx-1"></div>
                </div>
            </div>
        </div>
        
        <!-- V-shaped SVG at bottom -->
        <div class="absolute -bottom-1 left-0 w-full">
      <img src="{{ asset('images/svg/Content-banner.svg') }}" alt="gambar svg" class="w-full h-full">

        </div>
    </div>
    </section>

      <!-- about section -->

    <section>
    <div class="py-16 md:py-24">
            <div class="container mx-auto px-4 md:px-6">
                <div class="flex flex-col md:flex-row">
                    <!-- Left column: Image -->
                    <div class="w-full md:w-1/2 mb-8 md:mb-0">
                        <img src="{{asset('images/about.png')}}" alt="Office Building" class="w-full max-w-md h-full object-cover rounded-lg shadow-lg ml-auto mr-auto">
                    </div>
                    
                    <!-- Right column: Content -->
                    <div class="w-full md:w-1/2  md:pr-35 flex flex-col justify-center">
                        <h2 class="text-3xl md:text-4xl font-bold mb-6 text-[#C9B172]">PT Amanullah Modis Mandiri</h2>
                        <p class="text-white mb-6 text-justify">
                            Terbentuk sejak tahun 2015, dengan berbadan hukum resmi yang bergerak pada penyedia barang & Jasa Kontraktor. Kami merupakan perusahaan berkembang & siap bersaing dengan perusahaan-perusahaan yang bergerak pada bidang yang sama.
                        </p>
                        <p class="text-white mb-6 text-justify">
                            Kami mengedepankan teknologi baru serta kemampuan personil baik team perencanaan serta team implementasi di lapangan yang berfokus pada target & kualitas. Melengkapi para pekerja dengan peralatan, pengalaman serta pengetahuan dalam bidangnya yang akan menjadikannya sesuai dengan standar kualitas yang diharapkan oleh setiap klien.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- jasa & produk section -->

    <section>
    <div class="container mx-auto px-8 py-12">
      <div class="px-35">
        <h1 class="text-4xl font-bold mb-6 text-white">Jasa <span class="text-[#F3DB9F]">&</span> Produk</h1>
        
        <div class="mb-14">
            <p class="text-white mb-2 max-w-2xl">
                Ruang lingkup pekerjaan kami adalah segala sesuatu yang berhubungan dengan 
                kelistrikan perusahaan anda. Seluruh produk yang kami sediakan, adalah produk
                dengan kualitas terbaik, selalu menyesuaikan kebutuhan & kepuasan mitra kami.
            </p>
        </div>
        </div>
        
        <div class="flex flex-wrap gap-8 justify-center">
            <!-- Card 1 - Elektrikal & Mekanikal -->
            <div class="relative overflow-hidden rounded-lg w-[562px] h-[288px]">
                <div class="absolute inset-0 bg-black-100 flex items-center justify-center z-10">
                    <h2 class="text-2xl font-bold text-[#C9B172]">ELEKTRIKAL & MEKANIKAL</h2>
                </div>
                <img src="{{ asset('images/elektrikal.jpg') }}" alt="Elektrikal & Mekanikal" class="object-cover w-full h-full brightness-50 style="object-position: center 35%;"">
            </div>
            
            <!-- Card 2 - Teknik & Rekayasa Sipil -->
            <div class="relative overflow-hidden rounded-lg w-[562px] h-[288px]">
                <div class="absolute inset-0 bg-black-100 flex items-center justify-center z-10">
                    <h2 class="text-2xl font-bold text-[#C9B172]">TEKNIK & REKAYASA SIPIL</h2>
                </div>
                <img src="{{ asset('images/sipil.png') }}" alt="Teknik & Rekayasa Sipil" class="object-cover ob w-full h-full brightness-50" style="object-position: center 35%;">
            </div>
        </div>
    </section>
@endsection