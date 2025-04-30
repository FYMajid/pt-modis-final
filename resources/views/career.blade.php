@extends('layouts.app')

@section('content')
<section class="flex justify-center items-center min-h-screen bg-black py-10">
  <div class="w-full max-w-4xl bg-[#212121] rounded-lg shadow-lg overflow-hidden">
    <!-- Logo and Company Name -->
    <div class="flex flex-col items-center py-6 px-4">
      <div class="flex flex-col items-center">
        <img src="{{ asset('images/company-logo.png') }}" alt="PT Amanullah Modis Mandiri" class="h-16 mb-2">
        <div class="text-center">
          <h2 class="text-lg font-semibold text-yellow-400">PT AMANULLAH MODIS MANDIRI</h2>
          <p class="text-xs text-yellow-400">ONE STOP SOLUTION ELECTRICAL PARTNERS</p>
        </div>
      </div>
      <div class="w-full border-t border-yellow-400 my-4"></div>
      <h1 class="text-3xl font-bold text-white mb-6">Lets Join Us</h1>
    </div>

    <!-- Job Selection and Details -->
    <div class="bg-gray-900 p-4">
      <!-- Job Position Dropdown -->
      <div class="w-full mb-4">
        <select id="jobPosition" class="w-full p-4 bg-white rounded-md text-gray-800 cursor-pointer" onchange="showJobDescription()">
          <option value="" disabled selected>Select Job Position</option>
          @forelse($careers as $career)
            <option value="{{ $career->id }}">{{ $career->position }}</option>
          @empty
            <option value="" disabled>No positions available</option>
          @endforelse
        </select>
      </div>

      <!-- No Job Available Message (shown when no job is selected) -->

      <!-- No Jobs Found Message (shown when no jobs exist) -->
      @if($careers->isEmpty())
      <div class="w-full bg-white rounded-md p-6 text-center">
        <p class="text-lg font-medium">Mohon Maaf, saat ini tidak ada lowongan pekerjaan yang tersedia</p>
      </div>
      @endif

      <!-- Job Description Cards (Hidden by default) -->
      @foreach($careers as $career)
      <div id="job-{{ $career->id }}" class="job-details w-full bg-white rounded-md p-6 hidden">
        <h2 class="text-xl font-bold mb-4 text-center">{{ $career->position }}</h2>
        
        <div class="mb-6">
          <h3 class="font-bold text-lg mb-2">Deskripsi Pekerjaan</h3>
          <div class="text-sm whitespace-pre-line">
            {!! nl2br(e($career->description)) !!}
          </div>
        </div>

        <div class="text-center">
          <a href="{{ $career->link }}" target="_blank" class="bg-gray-800 text-white px-12 py-3 rounded-md hover:bg-gray-700 transition inline-block">Apply</a>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

<script>
  function showJobDescription() {
    // Get all job details elements
    const jobDetails = document.querySelectorAll('.job-details');
    const noJobMessage = document.getElementById('noJobMessage');
    const selectedJobId = document.getElementById('jobPosition').value;
    
    // Hide all job details first
    jobDetails.forEach(element => {
      element.classList.add('hidden');
    });
    
    if (selectedJobId) {
      // Show the selected job details
      const selectedJobDetails = document.getElementById('job-' + selectedJobId);
      if (selectedJobDetails) {
        selectedJobDetails.classList.remove('hidden');
        noJobMessage.classList.add('hidden');
      } else {
        noJobMessage.classList.remove('hidden');
      }
    } else {
      // No job selected, show the message
      noJobMessage.classList.remove('hidden');
    }
  }

  // Initialize the page by showing the first job if available
  document.addEventListener('DOMContentLoaded', function() {
    const selectElement = document.getElementById('jobPosition');
    if (selectElement && selectElement.options.length > 1) {
      selectElement.selectedIndex = 1;
      showJobDescription();
    }
  });
</script>
@endsection