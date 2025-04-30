@extends('layouts.app')

@section('content')

  <!-- Hero Section -->
  <section>
   <div class="relative h-screen bg-gray-900 overflow-hidden">
        <!-- Background image with opacity -->
        <div class="absolute inset-0 bg-black opacity-90">
            <!-- Carousel background images -->
            <div class="carousel-bg active">
                <img src="{{ asset('images/banner.jpg') }}" alt="Background 1" class="w-full h-full object-cover">
            </div>
            <div class="carousel-bg hidden">
                <img src="{{ asset('storage/' . $hotNews[0]->image) }}" alt="Background 2" class="w-full h-full object-cover" >
            </div>
            <div class="carousel-bg hidden">
                <img src="{{ asset('storage/' . $hotNews[1]->image) }}" alt="Background 3" class="w-full h-full object-cover">
            </div>
        </div>

        <!-- Navigation arrows -->
        <div class="absolute inset-x-0 top-1/2 flex justify-between items-center px-4 md:px-10 z-20 transform -translate-y-1/2">
            <button class="text-yellow-500 hover:text-yellow-400 focus:outline-none" id="prevSlide">
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
            <button class="text-yellow-500 hover:text-yellow-400 focus:outline-none" id="nextSlide">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 md:h-12 md:w-12" fill="none" viewBox="0 0 24 24" stroke="url(#gradient1)">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>
        </div>

        <!-- Main Content - Carousel -->
        <div class="carousel-container relative z-10 flex flex-col items-center justify-center h-full px-4 md:px-8 w-full">
            <!-- Slide 1 - Original Content -->
            <div class="carousel-slide text-center max-w-4xl mx-auto active">
                <h1 class="text-4xl md:text-7xl lg:text-6xl font-plus-jakarta bg-gradient-to-br from-[#C9B172] to-[#F3DB9F] bg-clip-text text-transparent mb-6">
                    PT Amanullah Modis Mandiri
                </h1>
                <p class="text-white text-sm md:text-base lg:text-lg mb-10 max-w-3xl mx-auto leading-relaxed">
                    Spesialis Kontraktor Mekanikal, Elektrikal, Plumbing, HVAC Yang Telah Memiliki Beragam 
                    Pengalaman Selama Paket Pekerjaan Mekanikal & Elektrikal Di Berbagai Jenis Proyek Gedung 
                    Serta Industri Antara Lain Mall, Apartemen, Gedung Kantor, Rumah Sakit, Pabrik & Gedung Hotel
                </p>
                
                <a href="#" class="bg-gradient-to-br from-[#ECC543] to-[#F3DB9F] hover:bg-yellow-600 text-gray-900 font-medium px-8 py-3 rounded-full transition duration-300">
                    Discover our Services
                </a>
            </div>
            
            <!-- Slide 2 - Hot News 1 -->
            @if(isset($hotNews) && count($hotNews) > 0)
            <div class="carousel-slide text-center max-w-4xl mx-auto hidden relative">
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold bg-gradient-to-br from-[#C9B172] to-[#F3DB9F] bg-clip-text text-transparent mb-6">
                    {{ $hotNews[0]->judul }}
                </h1>
                <p class="text-white text-sm md:text-base lg:text-lg mb-10 max-w-3xl mx-auto leading-relaxed">
                    {{ Str::limit($hotNews[0]->deskripsi, 200) }}
                </p>
                
                <a href="{{ $hotNews[0]->link }}" class="bg-gradient-to-br from-[#ECC543] to-[#F3DB9F] hover:bg-yellow-600 text-gray-900 font-medium px-8 py-3 rounded-full transition duration-300">
                    Read More
                </a>
            </div>
            @endif
            
            <!-- Slide 3 - Hot News 2 -->
            @if(isset($hotNews) && count($hotNews) > 1)
            <div class="carousel-slide text-center max-w-4xl mx-auto hidden">
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold bg-gradient-to-br from-[#C9B172] to-[#F3DB9F] bg-clip-text text-transparent mb-6">
                    {{ $hotNews[1]->judul }}
                </h1>
                <p class="text-white text-sm md:text-base lg:text-lg mb-10 max-w-3xl mx-auto leading-relaxed">
                    {{ Str::limit($hotNews[1]->deskripsi, 200) }}
                </p>
                
                <a href="{{ $hotNews[1]->link }}" class="bg-gradient-to-br from-[#ECC543] to-[#F3DB9F] hover:bg-yellow-600 text-gray-900 font-medium px-8 py-3 rounded-full transition duration-300">
                    Read More
                </a>
            </div>
            @endif
                
            <!-- Navigation dots -->
            <div class="flex justify-center mt-12">
                <div class="carousel-dot w-2 h-2 rounded-full bg-yellow-500 mx-1 cursor-pointer" data-slide="0"></div>
                <div class="carousel-dot w-2 h-2 rounded-full bg-white mx-1 cursor-pointer" data-slide="1"></div>
                <div class="carousel-dot w-2 h-2 rounded-full bg-white mx-1 cursor-pointer" data-slide="2"></div>
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
                    <h2 class="text-4xl font-plusjakarta font-bold text-[#C9B172] drop-shadow-lg">PT Amanullah Modis Mandiri</h2>

                        <p class="text-white font-plusjakarta mb-6 text-justify">
                            Terbentuk sejak tahun 2015, dengan berbadan hukum resmi yang bergerak pada penyedia barang & Jasa Kontraktor. Kami merupakan perusahaan berkembang & siap bersaing dengan perusahaan-perusahaan yang bergerak pada bidang yang sama.
                        </p>
                        <p class="text-white font-plusjakarta mb-6 text-justify">
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
        <h1 class="text-4xl font-plusjakarta font-bold mb-6 text-white">Jasa <span class="text-[#F3DB9F]">&</span> Produk</h1>
        
        <div class="mb-14">
            <p class="text-white font-plusjakarta mb-2 max-w-2xl">
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
                <img src="{{ asset('images/elektrikal.jpg') }}" alt="Elektrikal & Mekanikal" class="object-cover w-full h-full brightness-50", style="object-position: center 35%;">
            </div>
            
            <!-- Card 2 - Teknik & Rekayasa Sipil -->
            <div class="relative overflow-hidden rounded-lg w-[562px] h-[288px]">
                <div class="absolute inset-0 bg-black-100 flex items-center justify-center z-10">
                    <h2 class="font-dm-sans text-2xl font-bold text-[#C9B172]">TEKNIK & REKAYASA SIPIL</h2>
                </div>
                <img src="{{ asset('images/sipil.png') }}" alt="Teknik & Rekayasa Sipil" class="object-cover ob w-full h-full brightness-50" style="object-position: center 35%;">
            </div>
        </div>
    </section>

    <!-- mengapa section -->
    <section>
    <div class="relative">
        <!-- SVG Background -->
        <svg viewBox="0 0 1280 755" fill="none" xmlns="http://www.w3.org/2000/svg" class="absolute inset-0 w-full h-auto">
            <rect width="1280" height="755" fill="url(#paint0_linear_2477_12)"/>
            <defs>
                <linearGradient id="paint0_linear_2477_12" x1="639.5" y1="0" x2="639.128" y2="730" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#212121" stop-opacity="0.29"/>
                    <stop offset="0.242931" stop-color="#EFD89D" stop-opacity="0.57"/>
                    <stop offset="0.671101" stop-color="#F3DB9F" stop-opacity="0.67"/>
                    <stop offset="0.928024" stop-color="#212121" stop-opacity="0.31"/>
                </linearGradient>
            </defs>
        </svg>

        <div class="py-16 md:py-24 relative z-10">
            <div class="container mx-auto px-4 md:px-6">
                <div class="flex flex-col md:flex-row items-center">
                    <!-- Left column: Image -->
                    <div class="w-full md:w-1/2 mb-8 md:mb-0 flex justify-center">
                        <!-- Wrapper container for relative positioning -->
                        <div class="relative max-w-md w-full">
                            <!-- Gambar utama -->
                            <img src="{{ asset('images/mengapa.png') }}" alt="Mengapa Kami"
                                class="w-full h-full object-cover rounded-xl shadow-2xl">

                            <!-- Gambar layanan kanan bawah (layanan2), nongol keluar setengah -->
                            <img src="{{ asset('images/layanan2.png') }}" alt="Layanan 1"
                                class="absolute bottom-0 right-0 w-24 h-24 md:w-32 md:h-32 object-cover rounded-xl transform translate-x-1/2 translate-y-1/2">


                            <!-- Gambar layanan kiri atas (layanan1), nongol keluar setengah -->
                            <img src="{{ asset('images/layanan1.png') }}" alt="Layanan 2"
                                class="absolute top-0 left-0 w-24 h-24 md:w-32 md:h-32 object-cover rounded-xl shadow-md -translate-x-1/2 -translate-y-1/2">

                        </div>
                    </div>

                    <!-- Right column: Text -->
                    <div class="w-full md:w-1/2 md:pr-35 flex flex-col justify-center">
                        <h2 class="text-3xl md:text-4xl font-plusjakarta font-bold mb-6">
                            <span class="text-white">Mengapa Harus<br></span>
                            <span class="text-[#F3DB9F]">Memilih</span> 
                            <span class="text-white"> Kami?</span>
                        </h2>
                        <p class="text-white font-plusjakarta mb-6 text-justify">
                            <span class="flex items-center mb-2">
                                <img src="{{ asset('images/check.png') }}" alt="check" class="mr-2" width="24" height="24">
                                Kami pastikan, seluruh masalah anda akan teratasi, dengan solusi yang tepat & hasil yang memuaskan.
                            </span>

                            <span class="flex items-center mb-2">
                                <img src="{{ asset('images/check.png') }}" alt="check" class="mr-2" width="24" height="24">
                                Seluruh tim kami adalah individu-individu yang ahli & berpengalaman di setiap bidangnya.
                            </span>

                            <span class="flex items-center mb-2">
                                <img src="{{ asset('images/check.png') }}" alt="check" class="mr-2" width="24" height="24">
                                Kami menargetkan, zero complain di setiap lini pekerjaan yang kami tangani.
                            </span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- klien section -->
<section class="bg-[#1E1E1E] py-12 px-4 md:px-8 text-white">
    <div class="text-center mb-10">
    <h1 class="text-[#FFFFFF] text-4xl md:text-5xl font-plusjakarta font-bold">
  Klien Kami di Berbagai Daerah 
  <span style="background: linear-gradient(to bottom, #FBF09A, #83672B); -webkit-background-clip: text; color: transparent;">Seluruh</span> 
  <span style="background: linear-gradient(to top, #FBF09A, #83672B); -webkit-background-clip: text; color: transparent;">Indonesia</span>
</h1>



    </div>

    <!-- Gambar Peta Full -->
    <div class="flex justify-center mb-10">
        <img src="{{ asset('images/peta.png') }}" alt="Peta Sebaran Klien" class="max-w-full h-auto">
    </div>
    <div class="text-center mb-10">
    <h1 class="text-4xl md:text-5xl font-plusjakarta font-bold">
        <span style="background: linear-gradient(to bottom, #C3AF82, #C39F26); -webkit-background-clip: text; color: transparent;">Klien</span> Kami
    </h1>
</div>


    <!-- Gambar Peta Full -->
    <div class="flex justify-center mb-10">
        <img src="{{ asset('images/partners.png') }}" alt="Peta Sebaran Klien" class="max-w-full h-auto">
    </div>

</section>


@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const slides = document.querySelectorAll('.carousel-slide');
    const bgSlides = document.querySelectorAll('.carousel-bg');
    const dots = document.querySelectorAll('.carousel-dot');
    const prevButton = document.getElementById('prevSlide');
    const nextButton = document.getElementById('nextSlide');
    let currentSlide = 0;
    const totalSlides = slides.length;
    
    // Function to update slide display
    function showSlide(index) {
        // Hide all slides
        slides.forEach(slide => slide.classList.add('hidden'));
        slides.forEach(slide => slide.classList.remove('active'));
        
        // Hide all background slides
        bgSlides.forEach(bg => bg.classList.add('hidden'));
        bgSlides.forEach(bg => bg.classList.remove('active'));
        
        // Update dots
        dots.forEach(dot => dot.classList.remove('bg-yellow-500'));
        dots.forEach(dot => dot.classList.add('bg-white'));
        
        // Show current slide and background
        slides[index].classList.remove('hidden');
        slides[index].classList.add('active');
        
        // Make sure we don't try to access non-existent background slides
        if (index < bgSlides.length) {
            bgSlides[index].classList.remove('hidden');
            bgSlides[index].classList.add('active');
        }
        
        dots[index].classList.remove('bg-white');
        dots[index].classList.add('bg-yellow-500');
        
        currentSlide = index;
    }
    
    // Next slide function
    function nextSlide() {
        let next = currentSlide + 1;
        if (next >= totalSlides) next = 0;
        showSlide(next);
    }
    
    // Previous slide function
    function prevSlide() {
        let prev = currentSlide - 1;
        if (prev < 0) prev = totalSlides - 1;
        showSlide(prev);
    }
    
    // Set click handlers for dots
    dots.forEach((dot, index) => {
        dot.addEventListener('click', () => showSlide(index));
    });
    
    // Set click handlers for navigation buttons
    if (prevButton) prevButton.addEventListener('click', prevSlide);
    if (nextButton) nextButton.addEventListener('click', nextSlide);
    
    // Auto-rotate slides every 5 seconds
    let slideInterval = setInterval(nextSlide, 5000);
    
    // Pause auto-rotation when hovering over carousel
    const carouselContainer = document.querySelector('.carousel-container');
    carouselContainer.addEventListener('mouseenter', () => {
        clearInterval(slideInterval);
    });
    
    carouselContainer.addEventListener('mouseleave', () => {
        slideInterval = setInterval(nextSlide, 5000);
    });
    
    // Initialize the first slide
    showSlide(0);
});
</script>
@endsection 