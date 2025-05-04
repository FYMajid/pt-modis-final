@extends('layouts.app')

@section('style')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap');
     
    .custom{
            margin-top: 7rem;
        }
        .color{
            color: #525252;
        }
        
        

/* Laptop (1024px) */
@media (max-width: 1024px) {
    /* Hero Section */
    .hero-section .max-w-5xl {
        max-width: 90%;
    }
    
    .hero-section .text-4xl.md\:text-5xl.lg\:text-6xl {
        font-size: 3rem;
    }
    
    /* Kata Pengantar */
    .kata-pengantar .max-w-5xl {
        max-width: 90%;
        padding: 0 2rem;
    }
    
    /* Legalitas */
    .text-\[73px\] {
        font-size: 3.5rem;
    }
    
    /* YouTube */
    .text-4xl.md\:text-5xl {
        font-size: 2.5rem;
    }
}

/* Tablet (768px) */
@media (max-width: 768px) {

    /* Hero Section */
    .hero-section .content-about {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding-left:0;
        margin-left:0;
    }

    .content-about h1{
        font-size: 20px;
    }

    .content-about p{
        font-size: 20px;
    }

    /* pengantar section */

    .pengantar-section {
        padding-top:10rem;
    }

    /* legalitas section */

    .legalitas-section{
        padding-top:10rem;
    }

    /* Global */
    .grid-cols-2 {
        grid-template-columns: 1fr;
    }
    
    .flex-col.md\:flex-row {
        flex-direction: column;
    }
    
    .md\:w-2\/5, .md\:w-3\/5 {
        width: 100%;
    }
    
    /* Hero */
    .hero-section .text-4xl.md\:text-5xl.lg\:text-6xl {
        font-size: 2.5rem;
    }
    
    .hero-section .pt-24 {
        padding-top: 4rem;
    }
    
    /* Kata Pengantar */
    .kata-pengantar .p-10 {
        padding: 2rem;
    }
    
    .kata-pengantar .text-3xl {
        font-size: 1.75rem;
    }
    
    .kata-pengantar .h-12 {
        height: 2rem;
    }
    
    /* Legalitas */
    .text-\[73px\] {
        font-size: 3rem;
    }
    
    .text-\[42px\] {
        font-size: 2rem;
    }
    
    /* Visi Misi */
    .grid.grid-cols-1.md\:grid-cols-2 {
        grid-template-columns: 1fr;
    }
    
    /* YouTube */
    .min-h-screen.flex.flex-col {
        padding: 3rem 1rem;
    }
    
    .text-4xl.md\:text-5xl {
        font-size: 2rem;
        margin-bottom: 2rem;
    }
}

/* Mobile Landscape (640px) */
@media (max-width: 640px) {

    .content-about h1{
        font-size: 20px;
    }

    .content-about p{
        font-size: 20px;
    }

    /* pengantar section */

    .pengantar-section {
        padding-top:20rem;
    }

    /* legalitas section */

    .legalitas-section{
        padding-top:20rem;
    }

    /* Hero */
    .hero-section .text-4xl.md\:text-5xl.lg\:text-6xl {
        font-size: 2rem;
    }
    
    .hero-section .pt-24 {
        padding-top: 3rem;
    }
    
    /* Kata Pengantar */
    .kata-pengantar .p-10 {
        padding: 1.5rem;
    }
    
    .kata-pengantar .text-3xl {
        font-size: 1.5rem;
    }
    
    .kata-pengantar .mb-6 {
        margin-bottom: 0.75rem;
    }
    
    /* Legalitas */
    .text-\[73px\] {
        font-size: 2.5rem;
    }
    
    .bg-\[\#515151\].p-6 {
        padding: 1rem;
    }
    
    /* Modals */
    .modal.bg-white.p-8.rounded-lg.w-1\/2 {
        width: 90%;
        padding: 1.5rem;
    }
    
    .text-xl {
        font-size: 1.125rem;
    }
}

/* Mobile Portrait (480px) */
@media (max-width: 480px) {

    /* pengantar section */

    .pengantar-section {
        padding-top:25rem;
    }

    /* legalitas section */

    .legalitas-section{
        padding-top:32rem;
    }

    .legalitas-section h1{
        font-size: 50px;
    }    

    /* Hero */
    .hero-section .text-4xl.md\:text-5xl.lg\:text-6xl {
        font-size: 1.75rem;
    }
    
    .hero-section .px-6 {
        padding-left: 1rem;
        padding-right: 1rem;
    }
    
    .hero-section .text-sm.md\:text-base.lg\:text-lg {
        font-size: 0.875rem;
    }
    
    /* Kata Pengantar */
    .kata-pengantar .p-10 {
        padding: 1.25rem;
    }
    
    .kata-pengantar .h-12 {
        height: 1.5rem;
    }
    
    .kata-pengantar .text-white.mb-6 {
        font-size: 0.875rem;
    }
    
    /* Legalitas */
    .text-\[73px\] {
        font-size: 2rem;
    }
    
    /* YouTube */
    .text-4xl.md\:text-5xl {
        font-size: 1.75rem;
    }
    
    .inline-flex.items-center.px-8.py-3 {
        padding-left: 1.5rem;
        padding-right: 1.5rem;
    }
}

/* ===== SECTION-SPECIFIC FIXES ===== */

/* Kata Pengantar Section Spacing */
@media (min-width: 769px) {
    section:nth-of-type(2) { /* Kata Pengantar */
        padding: 5rem 0;
        margin-bottom: 3rem;
    }
}

@media (max-width: 768px) {
    section:nth-of-type(2) {
        padding: 3rem 0;
        margin-bottom: 2rem;
    }
}

/* Legalitas Logo Alignment */
@media (max-width: 640px) {
    .legalitas .flex.items-center {
        flex-direction: column;
        align-items: flex-start;
    }
    
    .legalitas .mr-4 {
        margin-right: 0;
        margin-bottom: 1rem;
    }
}

/* Sertifikasi Cards */
@media (max-width: 640px) {
    .sertifikasi .p-6 {
        padding: 1rem;
    }
    
    .sertifikasi .w-16 {
        width: 2.5rem;
    }
}

/* Visi Misi Cards */
@media (max-width: 480px) {
    .visi .p-6 {
        padding: 1rem;
    }
    
    .visi svg {
        width: 2.5rem;
        height: 2.5rem;
    }
}
    </style>
@endsection


@section('content')
   <!-- Hero Section -->
   <section class="hero-section">
    <div class="relative h-screen bg-gray-900 overflow-hidden">
            <!-- Background image dengan opacity -->
            <div class="absolute inset-0 bg-black opacity-60">
                <!-- Disini bisa ditambahkan background image jika diperlukan -->
                <img src="{{ asset('images/about.png') }}" alt="Background" class="w-full h-full object-cover">
            </div>
            <!-- Main Content -->
            <div class="relative z-10 flex flex-col items-start justify-start h-full px-4 md:px-30">
    <div class="text-left max-w-4xl mx-auto mt-30 ml-40 content-about"> <!-- Menambahkan margin-top dan margin-left -->
        <h1 class="text-4xl md:text-5xl lg:text-6xl font-plus-jakarta mb-6">
            PT Amanullah Modis Mandiri
        </h1>
        <p class="text-[25px] md:text-[25px] lg:text-[25px] mx-auto leading-relaxed font-jakarta-b text-white text-justify">
            Terbentuk sejak tahun 2015, dengan berbadan hukum resmi yang bergerak pada penyedia barang & Jasa Kontraktor. 
            Kami merupakan perusahaan berkembang & siap bersaing dengan perusahaan-perusahaan yang bergerak pada bidang yang sama. <br> <br>
            Kami mengedepankan teknologi baru serta kemampuan personil baik team perencanaan & team Implementasi di lapangan yang berfokus pada target dan kualitas.
            Melengkapi para pekerja dengan peralatan, pengalaman serta pengetahuan dalam bidangnya yang akan menjadikannya sesuai dengan standar kualitas yang di harapkan oleh setiap klien.
        </p>
    </div>
</div>

            
            <!-- V-shaped SVG at bottom -->
            <div class="absolute -bottom-20 left-0 w-full">
        <img src="{{ asset('images/svg/aboutFrame.svg') }}" alt="gambar svg" class="w-full h-full">
            </div>
        </div>
    </section>

    <!-- KATA PENGANTAR SECTION -->
    <section style="sans-serif !important">
        <div class="relative">
            <!-- SVG Background -->
            <svg width="100%" height="100%" viewBox="0 0 1281 718" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 0H1281V718H0V0Z" fill="url(#paint0_linear_2494_23)"/>
                <defs>
                    <linearGradient id="paint0_linear_2494_23" x1="640" y1="7.43274e-09" x2="640.287" y2="718" gradientUnits="userSpaceOnUse">
                        <stop offset="0.281667" stop-color="#212121" stop-opacity="0.49"/>
                        <stop offset="1" stop-color="#F3DB9F"/>
                    </linearGradient>
                </defs>
            </svg>
            
            <div class="absolute inset-0 flex items-center justify-center pengantar-section">
                <div class="max-w-7xl max-h-7xl w-full relative">
                    <h2 class="text-3xl font-jakarta-semi text-left mb-4">Kata Pengantar</h2>
                    <div class="bg-[#292929] shadow-lg rounded-lg p-10 relative">
                        <p class="font-jakarta-netral mb-6">
                            PT Amanullah Modis Mandiri adalah perusahaan yang bergerak di dalam Elektrikal Engineering, serta sedang melebarkan jaringan usaha di dalam bidang Rekayasa dan Teknik Sipil.
                        </p>
                        <p class="font-jakarta-netral mb-6">
                            Berbekal pengalaman kami lebih dari 15 tahun, individu-individu kami siap memberikan yang terbaik. Kami menjamin pelayanan optimal di setiap lini pekerjaan yang kami tangani.
                        </p>
                        <p class="font-jakarta-netral mb-6">
                            Profesionalisme dan ketelitian kami dalam memberikan pelayanan yang terbaik untuk Anda, adalah komitmen kami.
                        </p>
                        <p class="font-jakarta-netral mb-6">
                            Kami ucapkan terima kasih kepada seluruh klien kami atas kepercayaan yang diberikan, dan kami berharap untuk terus dapat memberikan yang terbaik.
                        </p>
                        <p class="font-jakarta-netral mb-6">
                            Hormat kami,
                        </p>
                        <p class="font-jakarta-netral-pengantar">
                            PT Amanullah Modis Mandiri<br>
                            Awadh<br>
                            (Direktur Utama)
                        </p>
                        <!-- Logo di dalam card di pojok kanan bawah -->
                        <div class="absolute bottom-4 right-4">
                            <img src="{{ asset('images/logoAbout.png') }}" alt="Logo" class="h-32 pr-9 mb-9">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION LEGALITAS -->
  <!-- resources/views/components/legalitas-section.blade.php -->
<section class="text-white pb-16">
<div class="container mx-auto px-4 py-8 legalitas-section">
        

        <div class="flex flex-col md:flex-row gap-6">
            <!-- Left Column - Certification Info -->
            <div class="md:w-2/5">
            <!-- Header with Logo and Title -->
        <div class="flex items-center mb-8">
            <div class="ml-8 mr-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="87" height="83" fill="none" viewBox="0 0 87 83">
                    <path fill="url(#a)" d="M43.5.875a12.81 12.81 0 0 0-12.103 8.583H4.875v8.584h8.369L.584 48.083c-2.018 8.584 4.29 12.875 15.02 12.875s17.424-4.291 15.02-12.875l-12.66-30.041h13.39c1.417 3.648 4.206 6.437 7.854 7.853v47.938H.583v8.584h85.834v-8.584H47.792v-47.98c3.648-1.374 6.437-4.163 7.81-7.811h13.433l-12.66 30.041c-2.017 8.584 4.292 12.875 15.02 12.875 10.73 0 17.425-4.291 15.022-12.875l-12.66-30.041h8.368V9.458h-26.48C53.8 4.308 48.95.875 43.5.875Zm0 8.583a4.292 4.292 0 1 1 0 8.584 4.292 4.292 0 0 1 0-8.584ZM15.604 31.99l6.438 16.093H9.167l6.437-16.093Zm55.792 0 6.437 16.093H64.958l6.438-16.093Z"/>
                        <defs>
                            <linearGradient id="a" x1=".039" x2="43.557" y1="-6.724" y2="82.417" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#C39F26"/>
                                <stop offset="1" stop-color="#C3AF82"/>
                            </linearGradient>
                        </defs>
                </svg>
            </div>
            <h1 class="font-jakarta-legalitas">Legalitas</h1>
        </div>
                <div class="flex items-center mt-16 mb-6 custom">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M14 13V11L12 12L10 11V13L8 14L10 15V17L12 16L14 17V15L16 14M14 2H7C6.46957 2 5.96086 2.21071 5.58579 2.58579C5.21071 2.96086 5 3.46957 5 4V18C5 18.5304 5.21071 19.0391 5.58579 19.4142C5.96086 19.7893 6.46957 20 7 20H8V18H7V4H13V8H17V18H16V20H17C17.5304 20 18.0391 19.7893 18.4142 19.4142C18.7893 19.0391 19 18.5304 19 18V7M14 13V11L12 12L10 11V13L8 14L10 15V17L12 16L14 17V15L16 14M10 23L12 22L14 23V18H10M14 13V11L12 12L10 11V13L8 14L10 15V17L12 16L14 17V15L16 14L14 13Z" fill="url(#paint0_linear_98_31)"/>
                        <defs>
                            <linearGradient id="paint0_linear_98_31" x1="12" y1="2" x2="12" y2="23" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#C39F26"/>
                                <stop offset="1" stop-color="#C3AF82"/>
                            </linearGradient>
                        </defs>
                </svg>
                    <h2 class="font-jakarta-netral-legal">Sertifikasi Badan Usaha Jasa Penunjang Tenaga Listrik</h2>
                </div>

                <div class="bg-[#515151] p-6 rounded">
                    <div class="mb-4">
                        <h3 class="font-legalitas mb-1">No. Sertifikat</h3>
                        <p class="font-legalitas-number">0XX.P.XXX.M.XB.3XXX.XX0 dan XXX.X.216.M.XX.XXX4.XX0</p>
                    </div>

                    <div class="grid grid-cols-2 mb-2">
                        <div>
                            <h3 class="font-legalitas mb-1">No. Registrasi</h3>
                            <p class="font-legalitas-number" >XXX8.XX.XX0 dan X0XX.02.XXX</p>
                        </div>
                        <div>
                            <h3 class="font-legalitas mb-1">Bidang</h3>
                            <p class="font-legalitas-number" >Instalasi Pemanfaatan Tenaga Listrik</p>
                        </div>
                    </div>

                    <div>
                        <h3 class="font-legalitas mb-1">SubBidang</h3>
                        <p class="font-legalitas-number" >Instalasi Pemanfaatan Tenaga Listrik Tegangan Menengah</p>
                        <p class="font-legalitas-number">Instalasi Pemanfaatan Tenaga Listrik Tegangan Rendah</p>
                        <p class="font-legalitas-number">Pembangkit Listrik Tenaga Diesel</p>
                    </div>
                </div>
            </div>

            <!-- Right Column - Registration Details -->
            <div class="md:w-3/5 bg-[#2C2C2C] p-6 rounded">
                <div class="grid grid-cols-2 gap-8">
                    <div>
                        <h3 class="font-legalitas mb-1">Akta Pendirian</h3>
                        <p class="font-legalitas-number">No. 27 Tanggal 21 Desember 2015</p>
                    </div>
                    <div>
                        <h3 class="font-legalitas mb-1">SK Kemenkumham</h3>
                        <p class="font-legalitas-number">AHU-0007839.AH.01.11.TAHUN 2016</p>
                    </div>

                    <div>
                        <h3 class="font-legalitas mb-1">Akta Perubahan</h3>
                        <p class="font-legalitas-number">No. 266 Tanggal 31 Desember 2018</p>
                    </div>
                    <div>
                        <h3 class="font-legalitas mb-1">SK Kemenkumham</h3>
                        <p class="font-legalitas-number">AHU-0003583.AH.01.11.TAHUN2019</p>
                    </div>

                    <div>
                        <h3 class="font-legalitas mb-1">Ket. Domisili</h3>
                        <p class="font-legalitas-number">152/27.1BU.1/31.74.04.1004/-071.562/e/2017</p>
                    </div>
                    <div>
                        <h3 class="font-legalitas mb-1">NPWP</h3>
                        <p class="font-legalitas-number">75.342.331.8-017.000</p>
                    </div>

                    <div>
                        <h3 class="font-legalitas mb-1">SP-PKP</h3>
                        <p class="font-legalitas-number">S-503PKP/WPJ.30/KP.0703/2017</p>
                    </div>
                    <div>
                        <h3 class="font-legalitas mb-1">SIUP</h3>
                        <p class="font-legalitas-number">50/24.1PK/31.74.04/-1.824.27/e/2016</p>
                    </div>

                    <div>
                        <h3 class="font-legalitas mb-1">TDP</h3>
                        <p class="font-legalitas-number">2717/24.3PT/31.74/-1.824.27/e/2016</p>
                    </div>
                    <div>
                        <h3 class="font-legalitas mb-1">SIUJK</h3>
                        <p class="font-legalitas-number">258/C.31/31.74.04.1005.04.005.K.3/2/-1.728/2019</p>
                    </div>

                    <div>
                        <h3 class="font-legalitas mb-1">NIB</h3>
                        <p class="font-legalitas-number">9120005380051BPJS</p>
                    </div>
                    <div>
                        <h3 class="font-legalitas mb-1">IUJPTL</h3>
                        <p class="font-legalitas-number">22/AB.4.1/31.74.04.1004.04.005.K3/2/-1.824.15/2020</p>
                    </div>

                    <div>
                        <h3 class="font-legalitas mb-1">BPJS Kesehatan</h3>
                        <p class="font-legalitas-number">80067736</p>
                    </div>
                    <div>
                        <h3 class="font-legalitas mb-1">BPJS Tenaga Kerja</h3>
                        <p class="font-legalitas-number">190000000740505</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    <!-- SECTION SERTIFIKASI & KOMPETENSI -->
    <section class="sertifikasi">
        <div class="container mx-auto py-10">
            <div class="text-left mb-6 px-10">
                <h2 class="font-jakarta-semi">Sertifikasi & Kompetensi</h2>

            </div>
            <div class="grid grid-cols-2 gap-4">
                <!-- Left Column -->
                <div class="grid grid-rows-3 gap-4">
                    <!-- Card 1 -->
                    <div class="bg-[#414141] p-6 rounded-lg shadow-lg flex items-center cursor-pointer" onclick="openModal('modal1')">
                        <img src="{{ asset('images/VectorSertifikasi.png') }}" alt="Sertifikasi" class="w-16 mr-4">
                        <h3 class="font-plus-jakarta-sertifikat">SERTIFIKAT BADAN USAHA JASA PELAKSANA KONTRUKSI</h3>
                    </div>
                    <!-- Card 2 -->
                    <div class="bg-[#414141] p-6 rounded-lg shadow-lg flex items-center cursor-pointer" onclick="openModal('modal2')">
                        <img src="{{ asset('images/VectorSertifikasi.png') }}" alt="Sertifikasi" class="w-16 mr-4">
                        <h3 class="font-plus-jakarta-sertifikat">SERTIFIKAT ISO 14001:2015 by OCS</h3>
                    </div>
                    <!-- Card 3 -->
                    <div class="bg-[#414141] p-6 rounded-lg shadow-lg flex items-center cursor-pointer" onclick="openModal('modal3')">
                        <img src="{{ asset('images/VectorSertifikasi.png') }}" alt="Sertifikasi" class="w-16 mr-4">
                        <h3 class="font-plus-jakarta-sertifikat">SERTIFIKAT KEAHLIAN (SKA MADYA)</h3>
                    </div> 
                </div>
                <!-- Right Column -->
                <div class="grid grid-rows-3 gap-4">
                    <!-- Card 4 -->
                    <div class="bg-[#414141] p-6 rounded-lg shadow-lg flex items-center cursor-pointer" onclick="openModal('modal4')">
                        <img src="{{ asset('images/VectorSertifikasi.png') }}" alt="Sertifikasi" class="w-16 mr-4">
                        <h3 class="font-plus-jakarta-sertifikat">SERTIFIKAT KOMPETENSI PELAKSANA PEMBANGUNAN & PEMASANGAN </h3>
                    </div>
                    <!-- Card 5 -->
                    <div class="bg-[#414141] p-6 rounded-lg shadow-lg flex items-center cursor-pointer" onclick="openModal('modal5')">
                        <img src="{{ asset('images/VectorSertifikasi.png') }}" alt="Sertifikasi" class="w-16 mr-4">
                        <h3 class="font-plus-jakarta-sertifikat">SERTIFIKAT KOMPETENSI</h3>
                    </div>
                    <!-- Card 6 -->
                    <div class="bg-[#414141] p-6 rounded-lg shadow-lg flex items-center cursor-pointer" onclick="openModal('modal6')">
                        <img src="{{ asset('images/VectorSertifikasi.png') }}" alt="Sertifikasi" class="w-16 mr-4">
                        <h3 class="font-plus-jakarta-sertifikat">SERTIFIKAT AHLI K3</h3>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modals -->
        <div id="modal1" class="modal hidden fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50">
            <div class="bg-[#414141] p-8 rounded-lg w-1/2 relative">
                <h3 class="font-plus-jakarta-sertifikat mb-4">SERTIFIKAT BADAN USAHA JASA PELAKSANA KONTRUKSI</h3>
                <p class="font-jakarta-sertif-card">No. Registrasi : 0-XXXX-XX-1XX-1-XX-9XXX0XX</p>
                <h3 class="font-plus-jakarta-sertifikat  mb-4">RINCIAN KLASIFIKASI &  KUALIFIKASI</h3>
                <p class="font-jakarta-sertif-card" style="position: relative; padding-left: 20px;">
                    <span style="position: absolute; left: 0; top: 0;">&#8226;</span>
                    Jasa pelaksana konstruksi Instalasi Pembangkit Tenaga Listrik semua daya
                </p>
                <p class="font-jakarta-sertif-card" style="position: relative; padding-left: 20px;">
                    <span style="position: absolute; left: 0; top: 0;">&#8226;</span>
                    
                    Jasa Pelaksana Instalasi Tenaga Listrik Gedung & Pabrik
                </p>
                <img src="{{ asset('images/close.png') }}" alt="Close" onclick="closeModal('modal1')" class="absolute top-4 right-4 w-6 cursor-pointer">
            </div>
        </div>

        <div id="modal2" class="modal hidden fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50">
            <div class="bg-[#414141] p-8 rounded-lg w-1/2 relative">
                <h3 class="font-plus-jakarta-sertifikat mb-4">SERTIFIKAT ISO 14001:2015 by OCS</h3>
                <p class="font-jakarta-sertif-card">Number : XXM0XXXX4XX19OCS</p>
                <h3 class="font-plus-jakarta-sertifikat mb-4">SCOPE OF CERTIFICATE</h3>
                <p class="font-jakarta-sertif-card style="position: relative; padding-left: 20px;">
                    <span class="font-jakarta-sertif-card style="position: absolute; left: 0; top: 0;">&#8226;</span>
                    Electrical Installation
                </p>
                <p class="font-jakarta-sertif-card style="position: relative; padding-left: 20px;">
                    <span class="font-jakarta-sertif-card style="position: absolute; left: 0; top: 0;">&#8226;</span>
                    Panel Maker & Electrical System
                </p>
                <p class="font-jakarta-sertif-card style="position: relative; padding-left: 20px;">
                    <span class="font-jakarta-sertif-card style="position: absolute; left: 0; top: 0;">&#8226;</span>
                    Civil Engineering
                </p>
                <img src="{{ asset('images/close.png') }}" alt="Close" onclick="closeModal('modal2')" class="absolute top-4 right-4 w-6 cursor-pointer">
            </div>
        </div>

        <div id="modal3" class="modal hidden fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50">
            <div class="bg-[#414141] p-8 rounded-lg w-1/2 relative">
                <h3 class="font-plus-jakarta-sertifikat mb-4">SERTIFIKAT KEAHLIAN (SKA MADYA) </h3>
                <h4 class="font-semi-jakarta">AHLI TEKNIK TENAGA LISTRIK MADYA</h4>
                <p class="font-jakarta-miring" style="position: relative; padding-left: 30px;">
                    <span class="font-jakarta-miring" style="position: absolute; left: 0; top: 0;">1.</span>MOHAMMAD ADINANDRA NAJIHAN
                </p>

                <p class="font-jakarta-miring" style="position: relative; padding-left: 30px;">
                    <span style="position: absolute; left: 0; top: 0;">2.</span>MAHENDRA, ST
                    <h3 class="font-plus-jakarta-sertifikat mb-4">KOMPETENSI</h3>
                <p class="font-jakarta-sertif-card" style="position: relative; padding-left: 20px;">
                    <span class="font-jakarta-sertif-card" style="position: absolute; left: 0; top: 0;">&#8226;</span>
                    Instalasi pemanfaatan tenaga listrik, dengan daya sebesar-besarnya 30MVA
                </p>
                <p class="font-jakarta-sertif-card" style="position: relative; padding-left: 20px;">
                    <span class="font-jakarta-sertif-card" style="position: absolute; left: 0; top: 0;">&#8226;</span>
                    Distribusi Tenaga Listrik Tegangan Rendah & Tegangan Menegah
                </p>
                <p class="font-jakarta-sertif-card" style="position: relative; padding-left: 20px;">
                    <span class="font-jakarta-sertif-card" style="position: absolute; left: 0; top: 0;">&#8226;</span>
                    Pembangkit Tenaga Listrik Kapasitas Daya Maksimum 5MV/mesin
                </p>
                <img src="{{ asset('images/close.png') }}" alt="Close" onclick="closeModal('modal3')" class="absolute top-4 right-4 w-6 cursor-pointer">
            </div>
        </div>

        <div id="modal4" class="modal hidden fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50">
            <div class="bg-[#414141] p-8 rounded-lg w-1/2 relative">
                <h3 class="font-plus-jakarta-sertifikat mb-4">SERTIFIKAT KOMPETENSI PELAKSANA PEMBANGUNAN DAN PEMASANGAN
                PEMANFAATAN TEGANGAN RENDAH & TEGANGAN MENENGAH</h3>
                <p class="font-jakarta-sertif-card">(KEMENTRIAN ENERGI & SUMBER DAYA MINERAL REPULIK INDONESIA)</p>
                <h3 class="font-plus-jakarta-sertifikat mb-4">RINCIAN UNIT KOMPETENSI INTI TEGANGAN RENDAH & TEGANGAN MENENGAH</h3>
                    <ul class="list-none pl-0">
                        <li class="relative flex justify-between items-center pl-6">
                            <span class="font-jakarta-sertif-card absolute left-0">•</span>
                            <span class="font-jakarta-sertif-card" ml-0>Pembangunan  & pemasangan komponen & Sirikit Instalasi pemanfaatan Tenaga Listrik</span>
                            <span class="font-jakarta-sertif-card ml-auto">(X.35.XXX.00.XXX.X)</span>
                        </li>
                    </ul>
                    <ul class="list-none pl-0">
                        <li class="relative flex justify-between items-center pl-6">
                            <span class="font-jakarta-sertif-card absolute left-0">•</span>
                            <span class="font-jakarta-sertif-card ml-0">Pembangunan & pemasangan komponen & sirikit Gardu Distribusi untuk Instalasi pemanfaatan Tenaga Listrik</span>
                            <span class="font-jakarta-sertif-card ml-auto"> (X.X5.1XX.02.XXX.X)</span>
                        </li>
                    </ul>
                    <ul class="list-none pl-0">
                        <li class="relative flex justify-between items-center pl-6">
                            <span class="font-jakarta-sertif-card absolute left-0">•</span>
                            <span class="font-jakarta-sertif-card ml-0">Pemeriksaan & Pengujian Komponen & Sirkit Instalasi Pemanfaatan Tenaga Listrik</span>
                            <span class="font-jakarta-sertif-card ml-auto">(X.XX.X4X.XX.X0X.1)</span>
                        </li>
                    </ul>
                    <ul class="list-none pl-0">
                        <li class="relative flex justify-between items-center pl-6">
                            <span class="font-jakarta-sertif-card absolute left-0">•</span>
                            <span class="font-jakarta-sertif-card ml-0">Pemeriksaan & Pengujian Komponen & Sirkit Gardu Distribusi untuk Instalasi Pemanfaatan Tenaga Listrik</span>
                            <span class="font-jakarta-sertif-card ml-auto">(X.X5.1XX.XX.01X.X)</span>
                        </li>
                    </ul>

                <img src="{{ asset('images/close.png') }}" alt="Close" onclick="closeModal('modal4')" class="absolute top-4 right-4 w-6 cursor-pointer">
            </div>
        </div>

        <div id="modal5" class="modal hidden fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50">
            <div class="bg-[#414141] p-8 rounded-lg w-1/2 relative">
                <h3 class="font-plus-jakarta-sertifikat mb-4">SERTIFIKAT KOMPETENSI</h3>
                <h3 class="font-semi-jakarta mb-4">MANAJEMEN ENERGI</h3>
                <h4 class="font-semi-jakarta mb-4">Kualifikasi Manajer Bangunan Gedung</h4>
                    <p class="font-jakarta-miring" style="position: relative; padding-left: 30px;">
                        <span style="position: absolute; left: 0; top: 0;">1.</span>AWADH
                    </p>
                <h3 class="font-plus-jakarta-sertifikat mb-4">KOMPETENSI</h3>
                    <p class="font-jakarta-kecil" style="position: relative; padding-left: 20px;">
                        <span style="position: absolute; left: 0; top: 0;">&#8226;</span>
                        Menerapkan prinsip-prinsip Penghematan Energi di Bangunan Gedung
                    </p>
                    <p class="font-jakarta-kecil" style="position: relative; padding-left: 20px;">
                        <span style="position: absolute; left: 0; top: 0;">&#8226;</span>
                        Menyiapkan Kebijakan Energi Organisasi
                    </p>
                    <p class="font-jakarta-kecil" style="position: relative; padding-left: 20px;">
                        <span style="position: absolute; left: 0; top: 0;">&#8226;</span>
                        Merencanakan Manajemen Energi
                    </p>
                    <p class="font-jakarta-kecil" style="position: relative; padding-left: 20px;">
                        <span style="position: absolute; left: 0; top: 0;">&#8226;</span>
                        Melaksanakan Rencana Manajemen Emergi
                    </p>
                    <p class="font-jakarta-kecil" style="position: relative; padding-left: 20px;">
                        <span style="position: absolute; left: 0; top: 0;">&#8226;</span>
                        Mengevaluasi Manajemen Energi
                    </p>
                    <p class="font-jakarta-kecil" style="position: relative; padding-left: 20px;">
                        <span style="position: absolute; left: 0; top: 0;">&#8226;</span>
                        Melaksanakan Tinjauan Manajemen
                    </p>
                <img src="{{ asset('images/close.png') }}" alt="Close" onclick="closeModal('modal5')" class="absolute top-4 right-4 w-6 cursor-pointer">
            </div>
        </div>

        <div id="modal6" class="modal hidden fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50">
            <div class="bg-[#414141] p-8 rounded-lg w-1/2 relative">
            <h3 class="font-plus-jakarta-sertifikat mb-4">SERTIFIKAT AHLI K3</h3>
                <p class="font-jakarta-sertif-card" style="position: relative; padding-left: 20px;">
                    <span style="position: absolute; left: 0; top: 0;">&#8226;</span>
                    Ahli K3 Spesialis Bidang Listrik
                    <br>
                    <span style="display: block; margin-top: 5px;">Nomor X/0XXX9/AX.XX.X4/XXX/2XXX</span>
                </p>
                <p class="font-jakarta-sertif-card" style="position: relative; padding-left: 20px;">
                    <span style="position: absolute; left: 0; top: 0;">&#8226;</span>
                    Ahli K3 Umum
                    <br>
                    <span style="display: block; margin-top: 5px;">Nomor 16.XXX/AXX/UMUM/xX/1XXX9</span>
                </p>
                <img src="{{ asset('images/close.png') }}" alt="Close" onclick="closeModal('modal6')" class="absolute top-4 right-4 w-6 cursor-pointer">
            </div>
        </div>
    </section>

    <!-- SECTION VISI & MISI -->
    <section class="visi bg-contain bg-center bg-no-repeat" style="background-image: url('{{ asset('images/about/bglogoabout.png') }}');">

<body class="bg-black text-white font-sans">
    <div class="container mx-auto px-4 py-12 max-w-7xl">
        <!-- Header Section -->
        <header class="mb-12">
            <h1 class="text-4xl md:text-5xl font-bold mb-6">
                <span class="text-white">Visi</span> 
                <span class="text-[#F3DB9F]">&</span> 
                <span class="text-white">Misi</span>
            </h1>
            
            <div class="mb-16">
    <p class="text-lg leading-relaxed text-white">
        <span class="font-semi-visi">Visi:</span> Menjadi Perusahaan Kebanggaan Nasional Yang Utama, Unggul, Terkemuka & Terdepan Dalam Layanan Serta Kinerja
        Dengan Selalu Memberikan Solusi Yang Inovatif Sehingga Setiap Mitra Kami Akan Selalu Puas Dengan Pelayanan Jasa Yang Kami Berikan.
    </p>
</div>

            
            <h2 class="text-xl font-semibold mb-6 text-white">Misi :</h2>
        </header>

        <!-- Mission Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Mission 1 -->
            <div class="bg-white rounded-lg p-6 flex items-start space-x-4">
                <div class="flex-shrink-0 text-amber-500">
                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="46" fill="none" viewBox="0 0 50 46">
  <path fill="url(#a)" d="M25 .5c3.083 0 5.556 2.503 5.556 5.625S28.083 11.75 25 11.75s-5.556-2.503-5.556-5.625S21.944.5 25 .5Zm25 33.75v-5.625c-6.222 0-11.556-2.7-15.556-7.538l-3.722-4.5a5.473 5.473 0 0 0-4.25-2.024h-2.86c-1.695 0-3.25.73-4.306 2.024l-3.723 4.5C11.556 25.925 6.223 28.625 0 28.625v5.625c7.694 0 14.417-3.29 19.444-9.14v6.328L8.667 35.797c-1.861.76-3.111 2.672-3.111 4.669 0 2.784 2.222 5.034 4.972 5.034h6.139v-1.406c0-3.882 3.11-7.032 6.944-7.032h8.333c.778 0 1.39.62 1.39 1.407s-.612 1.406-1.39 1.406h-8.333c-2.305 0-4.167 1.884-4.167 4.219V45.5h20.028c2.75 0 4.972-2.25 4.972-5.034 0-1.997-1.25-3.91-3.11-4.67l-10.778-4.358v-6.329C35.583 30.96 42.306 34.25 50 34.25Z"/>
  <defs>
    <linearGradient id="a" x1="25" x2="25" y1=".5" y2="45.5" gradientUnits="userSpaceOnUse">
      <stop stop-color="#C39F26"/>
      <stop offset="1" stop-color="#C3AF82"/>
    </linearGradient>
  </defs>
</svg>

                </div>
                <div class="flex-1">
                    <p class="text-black font-medium">
                        Meningkatkan Nilai Spiritual Kepada Tuhan Yang Maha Esa Untuk Seluruh Lapisan Perusahaan.
                    </p>
                </div>
            </div>

            <!-- Mission 2 -->
            <div class="bg-white rounded-lg p-6 flex items-start space-x-4">
                <div class="flex-shrink-0 text-amber-500">
                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="46" fill="none" viewBox="0 0 50 46">
  <path fill="url(#a)" d="m49.857 41.095-9.78-9.666c.954-2.358.477-5.423-1.67-7.31-2.147-2.121-5.248-2.593-7.872-1.414l4.532 4.48-3.34 3.3-4.77-4.715c-1.193 2.593-.716 5.659 1.43 8.016 2.148 2.122 5.01 2.594 7.396 1.65l9.78 9.668c.477.471 1.193.471 1.432 0l2.385-2.358c.716-.708.716-1.415.477-1.65Zm-23.616-2.829H0v-4.715c0-5.188 8.588-9.431 19.084-9.431 1.193 0 2.386 0 3.34.235-.716 1.415-.954 2.83-.954 4.48 0 3.773 1.908 7.31 4.77 9.431ZM19.084.542c-5.248 0-9.542 4.244-9.542 9.431 0 5.187 4.294 9.431 9.542 9.431s9.542-4.244 9.542-9.431c0-5.187-4.294-9.431-9.542-9.431Z"/>
  <defs>
    <linearGradient id="a" x1="25" x2="25" y1=".542" y2="45.457" gradientUnits="userSpaceOnUse">
      <stop stop-color="#C39F26"/>
      <stop offset="1" stop-color="#C3AF82"/>
    </linearGradient>
  </defs>
</svg>

                </div>
                <div class="flex-1">
                    <p class="text-black font-medium">
                        Memberikan Layanan Prima & Solusi Yang Bernilai Tambah Kepada Seluruh Mitra Kerja.
                    </p>
                </div>
            </div>

            <!-- Mission 3 -->
            <div class="bg-white rounded-lg p-6 flex items-start space-x-4">
                <div class="flex-shrink-0 text-amber-500">
                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="40" fill="none" viewBox="0 0 48 40">
  <path fill="url(#a)" d="M21.6 28.8h-4.8c0-11.928 9.672-21.6 21.6-21.6V12c-9.288 0-16.8 7.512-16.8 16.8Zm16.8-7.2v-4.8c-6.624 0-12 5.376-12 12h4.8a7.19 7.19 0 0 1 7.2-7.2ZM12 4.8C12 2.136 9.864 0 7.2 0a4.783 4.783 0 0 0-4.8 4.8c0 2.664 2.136 4.8 4.8 4.8 2.664 0 4.8-2.136 4.8-4.8ZM22.68 6h-4.8c-.576 3.408-3.48 6-7.08 6H3.6A3.595 3.595 0 0 0 0 15.6v6h14.4v-5.424C18.864 14.76 22.2 10.8 22.68 6ZM40.8 36c2.664 0 4.8-2.136 4.8-4.8 0-2.664-2.136-4.8-4.8-4.8a4.783 4.783 0 0 0-4.8 4.8c0 2.664 2.136 4.8 4.8 4.8Zm3.6 2.4h-7.2c-3.6 0-6.504-2.592-7.08-6h-4.8c.48 4.8 3.816 8.76 8.28 10.176V48H48v-6c0-1.992-1.608-3.6-3.6-3.6Z"/>
  <defs>
    <linearGradient id="a" x1="24" x2="24" y1="0" y2="48" gradientUnits="userSpaceOnUse">
      <stop stop-color="#C39F26"/>
      <stop offset="1" stop-color="#C3AF82"/>
    </linearGradient>
  </defs>
</svg>

                </div>
                <div class="flex-1">
                    <p class="text-black font-small">
                        Mengelola Bisnis Melalui Praktek Terbaik Dengan Mengoptimalisasikan Sumber Daya Manusia Yang Unggul, Serta Membangun Kemitraan Yang Saling Menguntungkan & Saling Mendukung Secara Sinergis.
                    </p>
                </div>
            </div>

            <!-- Mission 4 -->
            <div class="bg-white rounded-lg p-6 flex items-center justify-center space-x-4">
                <div class="flex-shrink-0 text-amber-500">
                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="48" fill="none" viewBox="0 0 50 48">
  <path fill="url(#a)" d="M38.625 32.73 50 12.845v34.591H0V1.953h5V33.64L18.75 9.533 35 19.085 45.6.562l4.325 2.527L36.85 25.96l-16.275-9.477-14.8 25.902h5.65L22.4 23.28l16.225 9.45Z"/>
  <defs>
    <linearGradient id="a" x1="25" x2="25" y1=".563" y2="47.438" gradientUnits="userSpaceOnUse">
      <stop stop-color="#C39F26"/>
      <stop offset="1" stop-color="#C3AF82"/>
    </linearGradient>
  </defs>
</svg>

                </div>
                <div class="flex-1 ">
                    <p class="text-black font-medium">
                        Meningkatkan Nilai Investasi Yang Unggul Bagi Investor
                    </p>
                </div>
            </div>

            <!-- Mission 5 -->
            <div class="bg-white rounded-lg p-6 flex items-start space-x-4">
                <div class="flex-shrink-0 text-amber-500">
                <svg xmlns="http://www.w3.org/2000/svg" width="45" height="60" fill="none" viewBox="0 0 45 60">
  <path fill="url(#a)" d="M32.23 26.1 36.487 42 22.5 30.6 8.514 42l4.256-15.6L0 15.9l16.419-.9L22.5 0l6.081 15L45 15.9 32.23 26.1ZM28.58 51h-3.04v-9l-3.04-3-3.04 3v9h-3.041c-3.345 0-6.081 2.7-6.081 6v3h24.324v-3c0-3.3-2.706-6-6.08-6Z"/>
  <defs>
    <linearGradient id="a" x1="22.5" x2="22.5" y1="0" y2="60" gradientUnits="userSpaceOnUse">
      <stop stop-color="#C39F26"/>
      <stop offset="1" stop-color="#C3AF82"/>
    </linearGradient>
  </defs>
</svg>

                </div>
                <div class="flex-1">
                    <p class="text-black font-medium">
                        Menciptakan Kondisi Terbaik Sebagai Tempat Berkarya & Berprestasi.
                    </p>
                </div>
            </div>

            <!-- Mission 6 -->
            <div class="bg-white rounded-lg p-6 flex items-start space-x-4">
                <div class="flex-shrink-0 text-amber-500">
                <svg xmlns="http://www.w3.org/2000/svg" width="59" height="40" fill="none" viewBox="0 0 59 40">
  <path fill="url(#a)" d="M27.042 15v5h-4.917v5h-4.917v-5h-2.95c-.983 3-3.687 5-6.883 5C3.195 25 0 21.75 0 17.5S3.196 10 7.375 10c3.196 0 5.9 2 6.883 5h12.784ZM7.375 15c-1.475 0-2.458 1-2.458 2.5S5.9 20 7.375 20s2.458-1 2.458-2.5S8.85 15 7.375 15Zm31.958 10C45.971 25 59 28.25 59 35v5H19.667v-5c0-6.75 13.029-10 19.666-10Zm0-5c-5.408 0-9.833-4.5-9.833-10s4.425-10 9.833-10c5.409 0 9.834 4.5 9.834 10s-4.425 10-9.834 10Z"/>
  <defs>
    <linearGradient id="a" x1="29.5" x2="29.5" y1="0" y2="40" gradientUnits="userSpaceOnUse">
      <stop stop-color="#C39F26"/>
      <stop offset="1" stop-color="#C3AF82"/>
    </linearGradient>
  </defs>
</svg>

                </div>
                <div class="flex-1">
                    <p class="text-black font-medium">
                        Menjadi Acuan Pelaksanaan Kepatuhan & Tata Kelola Perusahaan Yang Baik.
                    </p>
                </div>
            </div>
        </div>
    </div>
    </section>

    <!-- SECTION YOUTUBE -->
    <section class ="min-h-screen flex flex-col items-center justify-center">
    <div class="container mx-auto px-4 py-12 text-center">
        <h1 class="text-white text-4xl md:text-5xl font-bold mb-12">ONE STOP SOLUTION ELECTRICAL PARTNERS</h1>
        
        <div class="max-w-3xl mx-auto mb-12 rounded-lg overflow-hidden border-2 border-gray-700 relative">
            <!-- Video Container with direct embed -->
            <div class="relative pb-[56.25%] h-0">
                <!-- Gold border top -->
                <!-- <div class="absolute top-0 left-0 right-0 h-6 bg-yellow-600 z-10"></div> -->
                
                <!-- YouTube iframe embed -->
                <iframe 
    id="youtube-player"
    class="absolute top-0 left-0 w-full h-full border-10 border-white"
    src="https://www.youtube.com/embed/Ke1jciDd9YA?controls=0&autoplay=0&modestbranding=1&rel=0"
    title="YouTube video player"
    frameborder="0"
    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
    allowfullscreen>
</iframe>

                
                <!-- Gold border bottom -->
                <!-- <div class="absolute bottom-0 left-0 right-0 h-6 bg-yellow-600 z-10"></div> -->
                
                <!-- Custom play/pause button overlay -->
                <div id="customPlayButton" class="absolute inset-0 flex items-center justify-center z-20 cursor-pointer">
                    <div class="w-20 h-20 bg-purple-600 hover:bg-purple-700 rounded-full flex items-center justify-center transition-all transform hover:scale-110">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M8 5v14l11-7z" />
                        </svg>
                    </div>
                </div>
                
                <!-- Logo in bottom right -->
                <!-- <div class="absolute bottom-8 right-8 z-10">
                    <div class="w-12 h-12 rounded-full bg-black border-2 border-yellow-600 flex items-center justify-center">
                        <span class="text-yellow-600 text-xs font-bold">RKG</span>
                    </div>
                </div> -->
            </div>
        </div>
        
        <div class="mt-8">
        <a href="{{ asset('files/PT Amanullah Modis Mandiri Company Profile.pdf') }}" download class="inline-flex items-center px-8 py-3 bg-gradient-to-r from-[#ECC543] to-[#F3DB9F] hover:brightness-110 text-black font-bold rounded-full transition-all shadow-lg transform hover:scale-105">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
    </svg>
    Download Portfolio
</a>


        </div>
    </div>     
    </section>

@endsection
@section('scripts')
  <!-- JavaScript for opening and closing modals -->
  <script>
        function openModal(modalId) {
            document.getElementById(modalId).classList.remove('hidden');
        }

        function closeModal(modalId) {
            document.getElementById(modalId).classList.add('hidden');
        }



               // Simple play button functionality
               document.getElementById('customPlayButton').addEventListener('click', function() {
            // Get the iframe
            const iframe = document.getElementById('youtube-player');
            
            // Add autoplay=1 to URL and remove our custom play button
            iframe.src = iframe.src.replace('autoplay=0', 'autoplay=1');
            this.style.display = 'none';
        });
    </script>
@endsection