@extends('layouts.app')

@section('content')
   <!-- Hero Section -->
   <section>
    <div class="relative h-screen bg-gray-900 overflow-hidden">
            <!-- Background image dengan opacity -->
            <div class="absolute inset-0 bg-black opacity-90">
                <!-- Disini bisa ditambahkan background image jika diperlukan -->
                <img src="{{ asset('images/service.png') }}" alt="Background" class="w-full h-full object-cover">
            </div>
            <!-- Main Content -->
            <div class="relative z-10 flex flex-col items-center justify-center h-full px-4 md:px-8">
                <div class="text-left max-w-4xl mx-auto">
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold bg-gradient-to-br from-[#C9B172] to-[#F3DB9F] bg-clip-text text-transparent mb-6">
                        Jasa & Produk
                    </h1>
                    <p class="text-white text-sm md:text-base lg:text-lg mb-10 max-w-3xl mx-auto leading-relaxed">
                    Ruang lingkup perkejaan kami adalah segala sesuatu yang berhubungan dengan kelistrikan perusahaan anda.
                    </p>
                    <p class="text-white text-sm md:text-base lg:text-lg mb-10 max-w-3xl mx-auto leading-relaxed">
                    Seluruh produk yang kami sediakan, adalah produk dengan kualitas terbaik, & selalu menyesuaikan kebutuhan & kepuasan mitra kami.
                    </p>
                </div>
            </div>
            
            <!-- V-shaped SVG at bottom -->
            <div class="absolute -bottom-1 left-0 w-full">
        <img src="{{ asset('images/svg/serviceFrame.svg') }}" alt="gambar svg" class="w-full h-full">
            </div>
        </div>
    </section>

    <!-- Elektrikal & Mekanikal Section -->
    <section class="min-h-[600px]"> <!-- Increased min-height here -->
    <div class="container mx-auto px-4 py-12">
        <!-- Header Section -->
        <div class="mb-12">
            <h1 class="text-5xl font-bold text-white">Elektrikal <span class="text-[#F3DB9F]">&</span> Mekanikal</h1>
        </div>

        <!-- Services Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Left Column -->
            <div>
                <!-- Image -->
                <div class="mb-6 rounded-lg overflow-hidden">
                    <img src="{{ asset('images/elektrikal.png') }}" alt="Electrical Worker" class="w-full h-48 object-cover">
                </div>
                
                <!-- Services List -->
                <div class="relative pl-8">
                    <!-- Vertical Line -->
                    <div class="absolute left-3 top-3 bottom-3 w-0.5 bg-[#F3DB9F]"></div>
                    
                    <!-- Service 1 -->
                    <div class="relative mb-16">
                        <div class="absolute -left-2 top-1.5 transform -translate-x-full">
                            <div class="bg-[#F3DB9F] rounded-full w-6 h-6 z-10 relative"></div>
                        </div>
                        <h3 class="text-xl font-bold text-white">AUDIT ENERGI (TECHNICAL ASSESMENT)</h3>
                    </div>
                    
                    <!-- Service 2 -->
                    <div class="relative mb-16">
                        <div class="absolute -left-2 top-1.5 transform -translate-x-full">
                            <div class="bg-[#F3DB9F] rounded-full w-6 h-6 z-10 relative"></div>
                        </div>
                        <h3 class="text-xl font-bold text-white">SOLUSI KELISTRIKAN</h3>
                    </div>
                    
                    <!-- Service 3 -->
                    <div class="relative">
                        <div class="absolute -left-2 top-1.5 transform -translate-x-full">
                            <div class="bg-[#F3DB9F] rounded-full w-6 h-6 z-10 relative"></div>
                        </div>
                        <h3 class="text-xl font-bold text-white">PERBAIKAN SISTEM KELISTRIKAN</h3>
                    </div>
                </div>
            </div>
            
            <!-- Right Column -->
            <div>
                <!-- Image -->
                <div class="mb-6 rounded-lg overflow-hidden">
                    <img src="{{ asset('images/mekanikal.png') }}" alt="Electrical Panel" class="w-full h-48 object-cover">
                </div>
                
                <!-- Services List -->
                <div class="relative pl-8">
                    <!-- Vertical Line -->
                    <div class="absolute left-3 top-3 bottom-10 w-0.5 bg-[#F3DB9F]"></div>
                    
                    <!-- Service 1 -->
                    <div class="relative mb-16">
                        <div class="absolute -left-2 top-1.5 transform -translate-x-full">
                            <div class="bg-[#F3DB9F] rounded-full w-6 h-6 z-10 relative"></div>
                        </div>
                        <h3 class="text-xl font-bold text-white">DESAIN & PEMBUATAN PANEL LISTRIK</h3>
                    </div>
                    
                    <!-- Service 2 -->
                    <div class="relative mb-16">
                        <div class="absolute -left-2 top-1.5 transform -translate-x-full">
                            <div class="bg-[#F3DB9F] rounded-full w-6 h-6 z-10 relative"></div>
                        </div>
                        <h3 class="text-xl font-bold text-white">INSTALASI & PERAWATAN JARINGAN LISTRIK</h3>
                    </div>
                    
                    <!-- Service 3 -->
                    <div class="relative">
                        <div class="absolute -left-2 top-1.5 transform -translate-x-full">
                            <div class="bg-[#F3DB9F] rounded-full w-6 h-6 z-10 relative"></div>
                        </div>
                        <h3 class="text-xl font-bold text-white">PELAKSANA TEST & COMMISIONING<br>ELECTRICAL SYSTEM</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>

    <!-- teknik & rekayasa sipil -->
    <section class="text-white">
    <div class="container mx-auto px-4 py-8">
    <h1 class="text-5xl font-bold text-white text-center mb-6">Teknik <span class="text-[#F3DB9F]">&</span> Rekayasa Sipil</h1>
        
        <div class="border border-yellow-500 rounded-lg overflow-hidden">
            <div class="relative" style="height: 250px;">
                <!-- Background image with zoom out effect -->
                <div class="absolute inset-0 flex items-center justify-center bg-gray-900">
                    <img src="{{ asset('images/tekni&rekayasa.jpg') }}" alt="Civil Engineering Background" 
                         class=" h-100%  object-fill">
                </div>
                
                <!-- Dark overlay to improve text readability -->
                <div class="absolute inset-0 bg-black opacity-70"></div>
                
                <!-- Text Content -->
                <div class="absolute inset-0 flex items-center justify-center">
                    <div class="px-8 md:px-16 lg:px-24 max-w-4xl">
                        <p class="text-white text-center text-base md:text-lg leading-relaxed">
                            Design Interior & Eksterior adalah bagian dari bisnis kami. Variasi aplikasi desain
                            merupakan dasar kami dalam pengembangan konsep desain di setiap proyek yang kami
                            kerjakan dengan karakteristik yang khas. Impresi Inovasi & kreasi konsep desain adalah
                            satu proses tahapan pengembangan yang bernilai demi terciptanya sebuah karya.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    <!-- Teknik & Rekayasa Sipil Section -->
    <section class="relative min-h-[500px] bg-cover bg-center bg-no-repeat">
        <div class="absolute top-0 left-0 w-full">
            <img src="{{ asset('images/svg/layananFrame2.svg') }}" alt="Gold Accent" class="w-full h-auto">
        </div>
    
    <!-- Gold Accent Top Border -->

   
</section>

<section class="pb-20">
    <div class="container mx-auto relative px-4 py-16">
        <!-- Background circle (semi-transparent) -->
        <div class="absolute inset-0 bg-contain bg-center bg-no-repeat" style="background-image: url('{{ asset('images/linebusiness.png') }}');"></div>
        
        <!-- Content -->
        <div class="relative z-10">
            <!-- Heading -->
            <h1 class="text-5xl font-bold mb-16">
                <span class="text-[#F3DB9F]">Line</span> 
                <span class="text-white">Business</span>
            </h1>
            
            <!-- Flex container for content -->
            <div class="flex flex-col md:flex-row items-start justify-between gap-8">
                <!-- Left: Equipment Image -->
                <div class="md:w-1/2">
                    <img src="{{ asset('images/FOTO LINE BUSSINESS 3.png') }}" alt="Electrical Equipment" class="w-full">
                </div>
                
                <!-- Right: Services List -->
                <div class="md:w-1/2">
                    <!-- Timeline container -->
                    <div class="relative pl-10">
                        <!-- Vertical gold line -->
                        <div class="absolute left-3 top-2 bottom-0 w-0.5 bg-[#F3DB9F]" style="height: calc(100% - 40px);"></div>
                        
                        <!-- Service Item 1 -->
                        <div class="relative mb-16">
                            <!-- Gold dot -->
                            <div class="absolute -left-10 top-2 w-6 h-6 rounded-full bg-[#F3DB9F]"></div>
                            <span class="text-white text-xl">Technical Assessment</span>
                        </div>
                        
                        <!-- Service Item 2 -->
                        <div class="relative mb-16">
                            <!-- Gold dot -->
                            <div class="absolute -left-10 top-2 w-6 h-6 rounded-full bg-[#F3DB9F]"></div>
                            <span class="text-white text-xl">General Electric Supplier</span>
                        </div>
                        
                        <!-- Service Item 3 -->
                        <div class="relative mb-16">
                            <!-- Gold dot -->
                            <div class="absolute -left-10 top-2 w-6 h-6 rounded-full bg-[#F3DB9F]"></div>
                            <span class="text-white text-xl">Panel Maker & Electrical Switchboard</span>
                        </div>
                        
                        <!-- Service Item 4 -->
                        <div class="relative">
                            <!-- Gold dot -->
                            <div class="absolute -left-10 top-2 w-6 h-6 rounded-full bg-[#F3DB9F]"></div>
                            <div class="text-white">
                                <p class="text-xl">Supply, Installation & Maintenance Cubicle, Busduct, Transformers & Genset</p>
                                <p class="text-lg italic">(supported by CATERPILLAR)</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection