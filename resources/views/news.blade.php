@extends('layouts.app')
@section('style')
<!-- <style>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
</style> -->

<style>
    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap');

    @media screen and (max-width: 768px) {
        
        .svg-image{
           position: absolute;
           bottom: -1000px;
        }

        .old-section{
            margin-top: 100px;
            padding-top: 100px;
        }

        .image-container{
            display: flex;
            flex-direction: column;
        }

        .image-assets{
            display: flex;
            justify-content: center;
            align-items: center;
            padding-top : 20px;
        }
    }

    @media screen and (max-width: 480px) {
        
        .svg-image{
           position: absolute;
           bottom: -1200px;
        }

        .old-section{
            margin-top: 0;
            padding-top: 100px;
        }
    }

    @media screen and (max-width: 442px) {
        
        .svg-image{
            display: none;
        }
    }

      /* @media screen and (max-width: 375px) {
        
        .svg-image{
           position: absolute;
           bottom: -900px;
        }

        .old-section{
            margin-top: 0;
            padding-top: 100px;
        }
    } */

</style>

@endsection

@section('content')
<div class="pt-20 container mx-auto px-4 py-8 max-w-5xl">
    <!-- Hot News Section -->
    <div class="inline-block">
    <h2 class="section-title text-[#F3DB9F] text-[40px] font-jakarta">
        Hot <span class="text-white">News!</span>
    </h2>
        <div class="h-[2px] bg-gradient-to-r from-[#ECC543] to-[#F3DB9F] mt-2"></div>
    </div>
    
    <!-- Hot News Items -->
    @forelse($hotNews as $index => $news)
        <div class="mb-10 mt-10">
            <h3 class="font-jakarta text-[35px] text-[#F3DB9F]">{{ $news->judul }}</h3>
            <div class="flex flex-col md:flex-row gap-3 image-container">
                <div class="w-full md:w-1/2 image-assets">
                    <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->judul }}" class="w-[377px] h-[274px] object-cover">
                </div>
                <div class="w-full md:w-3/4">
                    <div class="text-sm mb-4 text-white text-[19px] text-justify font-jakarta-b">
                        {!! nl2br(e($news->deskripsi)) !!}
                    </div>
                    <div class="read-more text-right">
                        <a href="{{ $news->link }}" class="text-[#FBF09A]">Selengkapnya →</a>
                    </div>
                </div>
            </div>
            
            @if(!$loop->last)
                <div class="h-[2px] w-full bg-gradient-to-r from-[#ECC543] to-[#F3DB9F] mt-10 mb-10"></div>
            @endif
        </div>
    @empty
        <div class="mb-10">
            <p class="text-white text-center py-8">No hot news available at the moment.</p>
        </div>
    @endforelse
    
    <!-- Old News Section -->
    <div class="mt-16 pt-80 old-section">
        <div class="inline-block">
            <h2 class="section-title font-jakarta text-[40px] text-[#F3DB9F]">Old <span class="text-white">News!</span></h2>
            <div class="h-[2px] bg-gradient-to-r from-[#ECC543] to-[#F3DB9F] mt-2 mb-8"></div>
        </div>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
            @forelse($oldNews as $news)
                <div class="bg-gray-900 rounded-lg overflow-hidden transition-transform duration-300 hover:scale-105">
                    <a href="{{ $news->link }}" class="block">
                        <div class="aspect-square overflow-hidden">
                            <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->judul }}" class="w-full h-full object-cover">
                        </div>
                        <div class="p-3">
                            <h3 class="text-[#F3DB9F] text-sm font-semibold truncate">{{ $news->judul }}</h3>
                        </div>
                    </a>
                </div>
            @empty
                <div class="col-span-5">
                    <p class="text-white text-center py-8">No old news available at the moment.</p>
                </div>
            @endforelse
        </div>
    </div>

    <div class="absolute -bottom-130 left-0 w-full svg-image">
        <img src="{{ asset('images/svg/newsFrame.svg') }}" alt="gambar svg" class="w-full h-full">
    </div>
</div>
@endsection