@extends('layouts.index')

@section('content')
<!-- upload news start -->

<?php
// Fetch news data directly in the view file until we have a proper controller method
$hotNews = \App\Models\News::where('type', 'hot')->orderBy('created_at', 'desc')->get();
$oldNews = \App\Models\News::where('type', 'old')->orderBy('created_at', 'desc')->get();
$careers = \App\Models\Career::orderBy('created_at', 'desc')->get();
?>

<div x-data="newsManager()">
    <!-- Header -->
    <div class="bg-slate-800 text-white p-4 flex justify-between items-center">
        <h1 class="text-3xl font-bold">News Management</h1>
        <div class="flex space-x-4">
            <div class="flex border border-gray-600 rounded-md overflow-hidden">
                <button 
                    @click="currentTab = 'hot'" 
                    :class="{'bg-amber-500 text-white': currentTab === 'hot', 'bg-gray-700 text-gray-200': currentTab !== 'hot'}"
                    class="px-4 py-2 font-medium transition-colors">
                    Hot News
                </button>
                <button 
                    @click="currentTab = 'old'"
                    :class="{'bg-amber-500 text-white': currentTab === 'old', 'bg-gray-700 text-gray-200': currentTab !== 'old'}"
                    class="px-4 py-2 font-medium transition-colors">
                    Old News
                </button>
            </div>
            <button 
                @click="showModal = true; formData.type = currentTab;"
                class="bg-amber-50 hover:bg-amber-100 text-slate-800 font-semibold px-8 py-2 rounded-full">
                Upload
            </button>
        </div>
    </div>

    <!-- News Table - Hot News -->
    <div x-show="currentTab === 'hot'" class="overflow-x-auto">
        <table class="w-full border-collapse">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="py-4 px-6 text-center border border-gray-600">No</th>
                    <th class="py-4 px-6 text-center border border-gray-600">Image</th>
                    <th class="py-4 px-6 text-center border border-gray-600">Judul Artikel</th>
                    <th class="py-4 px-6 text-center border border-gray-600">Deskripsi</th>
                    <th class="py-4 px-6 text-center border border-gray-600">Link</th>
                    <th class="py-4 px-6 text-center border border-gray-600">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($hotNews as $index => $news)
                <tr class="border border-gray-300">
                    <td class="py-4 px-6 text-center border border-gray-300">{{ $index + 1 }}</td>
                    <td class="py-4 px-6 text-center border border-gray-300">
                        <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->judul }}" class="w-48 h-auto mx-auto">
                    </td>
                    <td class="py-4 px-6 border border-gray-300">
                        {{ $news->judul }}
                    </td>
                    <td class="py-4 px-6 border border-gray-300">
                        <div class="prose max-w-none">
                            {!! nl2br(e($news->deskripsi)) !!}
                        </div>
                    </td>
                    <td class="py-4 px-6 border border-gray-300">
                        <a href="{{ $news->link }}" target="_blank" class="text-blue-600 hover:underline">Link</a>
                    </td>
                    <td class="py-4 px-6 text-center border border-gray-300">
                        <div class="flex justify-center gap-2">
                            <button 
                                @click="editNews({{ $news->id }})" 
                                class="bg-yellow-400 hover:bg-yellow-500 text-black font-semibold py-1 px-3 rounded">
                                Edit
                            </button>
                            <button 
                                @click="moveToOld({{ $news->id }})"
                                class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-1 px-3 rounded">
                                Move to Old
                            </button>
                            <button 
                                @click="deleteNews({{ $news->id }})"
                                class="bg-red-500 hover:bg-red-600 text-white font-semibold py-1 px-3 rounded">
                                Delete
                            </button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="py-4 px-6 text-center border border-gray-300">No hot news available</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- News Table - Old News -->
    <div x-show="currentTab === 'old'" class="overflow-x-auto">
        <table class="w-full border-collapse">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="py-4 px-6 text-center border border-gray-600">No</th>
                    <th class="py-4 px-6 text-center border border-gray-600">Image</th>
                    <th class="py-4 px-6 text-center border border-gray-600">Judul Artikel</th>
                    <th class="py-4 px-6 text-center border border-gray-600">Deskripsi</th>
                    <th class="py-4 px-6 text-center border border-gray-600">Link</th>
                    <th class="py-4 px-6 text-center border border-gray-600">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($oldNews as $index => $news)
                <tr class="border border-gray-300">
                    <td class="py-4 px-6 text-center border border-gray-300">{{ $index + 1 }}</td>
                    <td class="py-4 px-6 text-center border border-gray-300">
                        <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->judul }}" class="w-48 h-auto mx-auto">
                    </td>
                    <td class="py-4 px-6 border border-gray-300">
                        {{ $news->judul }}
                    </td>
                    <td class="py-4 px-6 border border-gray-300">
                        <div class="prose max-w-none">
                            {!! nl2br(e($news->deskripsi)) !!}
                        </div>
                    </td>
                    <td class="py-4 px-6 border border-gray-300">
                        <a href="{{ $news->link }}" target="_blank" class="text-blue-600 hover:underline">Link</a>
                    </td>
                    <td class="py-4 px-6 text-center border border-gray-300">
                        <div class="flex justify-center gap-2">
                            <button 
                                @click="editNews({{ $news->id }})" 
                                class="bg-yellow-400 hover:bg-yellow-500 text-black font-semibold py-1 px-3 rounded">
                                Edit
                            </button>
                            <button 
                                @click="deleteNews({{ $news->id }})"
                                class="bg-red-500 hover:bg-red-600 text-white font-semibold py-1 px-3 rounded">
                                Delete
                            </button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="py-4 px-6 text-center border border-gray-300">No old news available</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Upload Modal -->
    <div x-show="showModal" class="fixed inset-0 z-50 overflow-auto bg-black bg-opacity-50 flex items-center justify-center" x-transition>
        <div class="relative bg-white rounded-lg shadow-lg max-w-3xl w-full mx-4" @click.away="showModal = true">
            <div class="flex justify-between items-center p-5 border-b">
                <h3 class="text-xl font-semibold text-gray-900">Upload News</h3>
                <button type="button" @click="showModal = false" class="text-gray-400 hover:text-gray-500">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="p-6">
                <form id="uploadForm" @submit.prevent="uploadNews()" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label for="judul" class="block text-gray-700 font-bold mb-2">Judul Artikel</label>
                        <input type="text" id="judul" x-model="formData.judul" class="w-full px-3 py-2 border border-gray-300 rounded" required>
                    </div>
                    <div class="mb-4">
                        <label for="image" class="block text-gray-700 font-bold mb-2">Image</label>
                        <input type="file" id="image" @change="handleFileChange($event)" class="w-full px-3 py-2 border border-gray-300 rounded" required>
                        <p class="text-sm text-gray-500 mt-1">Acceptable formats: JPEG, PNG, JPG, GIF</p>
                    </div>
                    <div class="mb-4">
                        <label for="deskripsi" class="block text-gray-700 font-bold mb-2">Deskripsi</label>
                        <textarea id="deskripsi" x-model="formData.deskripsi" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded" required></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="link" class="block text-gray-700 font-bold mb-2">Link</label>
                        <input type="url" id="link" x-model="formData.link" class="w-full px-3 py-2 border border-gray-300 rounded" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Type</label>
                        <div class="flex space-x-4">
                            <label class="inline-flex items-center">
                                <input type="radio" x-model="formData.type" value="hot" class="form-radio h-5 w-5 text-blue-600">
                                <span class="ml-2 text-gray-700">Hot News</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input type="radio" x-model="formData.type" value="old" class="form-radio h-5 w-5 text-blue-600">
                                <span class="ml-2 text-gray-700">Old News</span>
                            </label>
                        </div>
                    </div>
                    <div class="flex justify-end pt-4">
                        <button type="button" @click="showModal = false" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded mr-2">
                            Cancel
                        </button>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div x-show="showEditModal" class="fixed inset-0 z-50 overflow-auto bg-black bg-opacity-50 flex items-center justify-center" x-transition>
            <div class="relative bg-white rounded-lg shadow-lg max-w-3xl w-full mx-4" @click.away="showEditModal = true">
                <div class="flex justify-between items-center p-5 border-b">
                    <h3 class="text-xl font-semibold text-gray-900">Edit News</h3>
                    <button type="button" @click="showEditModal = false" class="text-gray-400 hover:text-gray-500">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="p-6">
                    <form id="editForm" @submit.prevent="updateNews()" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="edit_judul" class="block text-gray-700 font-bold mb-2">Judul Artikel</label>
                            <input type="text" id="edit_judul" x-model="formData.judul" class="w-full px-3 py-2 border border-gray-300 rounded" required>
                        </div>
                        <div class="mb-4">
                            <label for="edit_image" class="block text-gray-700 font-bold mb-2">Image</label>
                            <input type="file" id="edit_image" @change="handleFileChange($event)" class="w-full px-3 py-2 border border-gray-300 rounded">
                            <p class="text-sm text-gray-500 mt-1">Leave empty to keep current image</p>
                        </div>
                        <div class="mb-4">
                            <label for="edit_deskripsi" class="block text-gray-700 font-bold mb-2">Deskripsi</label>
                            <textarea id="edit_deskripsi" x-model="formData.deskripsi" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded" required></textarea>
                        </div>
                        <div class="mb-4">
                            <label for="edit_link" class="block text-gray-700 font-bold mb-2">Link</label>
                            <input type="url" id="edit_link" x-model="formData.link" class="w-full px-3 py-2 border border-gray-300 rounded" required>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2">Type</label>
                            <div class="flex space-x-4">
                                <label class="inline-flex items-center">
                                    <input type="radio" x-model="formData.type" value="hot" class="form-radio h-5 w-5 text-blue-600">
                                    <span class="ml-2 text-gray-700">Hot News</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="radio" x-model="formData.type" value="old" class="form-radio h-5 w-5 text-blue-600">
                                    <span class="ml-2 text-gray-700">Old News</span>
                                </label>
                            </div>
                        </div>
                        <div class="flex justify-end pt-4">
                            <button type="button" @click="showEditModal = false" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded mr-2">
                                Cancel
                            </button>
                            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                                Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</div>

    <!-- Toast Notification -->
    <div 
        x-data="{ show: false, message: '', type: 'success' }"
        x-show="show"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 transform translate-y-2"
        x-transition:enter-end="opacity-100 transform translate-y-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 transform translate-y-0"
        x-transition:leave-end="opacity-0 transform translate-y-2"
        @notify.window="show = true; message = $event.detail.message; type = $event.detail.type; setTimeout(() => { show = false }, 3000)"
        class="fixed bottom-4 right-4 px-6 py-3 rounded-lg shadow-lg"
        :class="{'bg-green-500 text-white': type === 'success', 'bg-red-500 text-white': type === 'error'}"
        style="z-index: 60;">
        <div class="flex items-center space-x-2">
            <div x-show="type === 'success'" class="text-lg">✓</div>
            <div x-show="type === 'error'" class="text-lg">✗</div>
            <div x-text="message"></div>
        </div>
    </div>
</div>

<!-- Career Management Section -->
<div x-data="careerManager()" x-init="init">
    <!-- Header -->
    <div class="bg-slate-800 text-white p-4 flex justify-between items-center">
        <h1 class="text-3xl font-bold">Career Opportunities Management</h1>
        <div class="flex space-x-4">
            <button 
                @click="showModal = true; resetForm();"
                class="bg-amber-50 hover:bg-amber-100 text-slate-800 font-semibold px-8 py-2 rounded-full">
                Add New Career
            </button>
        </div>
    </div>

    <!-- Careers Table -->
    <div class="overflow-x-auto">
        <table class="w-full border-collapse">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="py-4 px-6 text-center border border-gray-600">No</th>
                    <th class="py-4 px-6 text-center border border-gray-600">Position</th>
                    <th class="py-4 px-6 text-center border border-gray-600">Description</th>
                    <th class="py-4 px-6 text-center border border-gray-600">Link</th>
                    <th class="py-4 px-6 text-center border border-gray-600">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($careers as $index => $career)
                <tr class="border border-gray-300">
                    <td class="py-4 px-6 text-center border border-gray-300">{{ $index + 1 }}</td>
                    <td class="py-4 px-6 border border-gray-300">
                        {{ $career->position }}
                    </td>
                    <td class="py-4 px-6 border border-gray-300">
                        <div class="text-sm prose max-w-none">
                            {!! $career->description !!}
                        </div>
                    </td>
                    <td class="py-4 px-6 border border-gray-300">
                        <a href="{{ $career->link }}" target="_blank" class="text-blue-600 hover:underline">Link</a>
                    </td>
                    <td class="py-4 px-6 text-center border border-gray-300">
                        <div class="flex justify-center gap-2">
                            <button 
                                @click="editCareer({{ $career->id }})" 
                                class="bg-yellow-400 hover:bg-yellow-500 text-black font-semibold py-1 px-3 rounded">
                                Edit
                            </button>
                            <button 
                                @click="deleteCareer({{ $career->id }})"
                                class="bg-red-500 hover:bg-red-600 text-white font-semibold py-1 px-3 rounded">
                                Delete
                            </button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="py-4 px-6 text-center border border-gray-300">No career opportunities available</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Add Career Modal -->
    <div x-show="showModal" class="fixed inset-0 z-50 overflow-auto bg-black bg-opacity-50 flex items-center justify-center" x-transition>
        <div class="relative bg-white rounded-lg shadow-lg max-w-3xl w-full mx-4" @click.away="showModal = false">
            <div class="flex justify-between items-center p-5 border-b">
                <h3 class="text-xl font-semibold text-gray-900">Add Career Opportunity</h3>
                <button type="button" @click="showModal = false" class="text-gray-400 hover:text-gray-500">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="p-6">
                <form id="uploadCareerForm" @submit.prevent="uploadCareer()">
                    @csrf
                    <div class="mb-4">
                        <label for="position" class="block text-gray-700 font-bold mb-2">Position</label>
                        <input type="text" id="position" x-model="formData.position" class="w-full px-3 py-2 border border-gray-300 rounded" required>
                    </div>
                    <div class="mb-4">
                        <label for="description" class="block text-gray-700 font-bold mb-2">Description</label>
                        <input id="description" type="hidden" name="description" x-model="formData.description" x-ref="trixInput">
                        <trix-editor input="description" x-ref="trixEditor" class="trix-content border border-gray-300 rounded"></trix-editor>
                    </div>
                    <div class="mb-4">
                        <label for="link" class="block text-gray-700 font-bold mb-2">Application Link</label>
                        <input type="url" id="link" x-model="formData.link" class="w-full px-3 py-2 border border-gray-300 rounded" required>
                        <p class="text-sm text-gray-500 mt-1">Link where applicants can apply for this position</p>
                    </div>
                    <div class="flex justify-end pt-4">
                        <button type="button" @click="showModal = false" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded mr-2">
                            Cancel
                        </button>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Career Modal -->
    <div x-show="showEditModal" class="fixed inset-0 z-50 overflow-auto bg-black bg-opacity-50 flex items-center justify-center" x-transition>
        <div class="relative bg-white rounded-lg shadow-lg max-w-3xl w-full mx-4" @click.away="showEditModal = false">
            <div class="flex justify-between items-center p-5 border-b">
                <h3 class="text-xl font-semibold text-gray-900">Edit Career Opportunity</h3>
                <button type="button" @click="showEditModal = false" class="text-gray-400 hover:text-gray-500">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="p-6">
                <form id="editCareerForm" @submit.prevent="updateCareer()">
                    @csrf
                    <div class="mb-4">
                        <label for="edit_position" class="block text-gray-700 font-bold mb-2">Position</label>
                        <input type="text" id="edit_position" x-model="formData.position" class="w-full px-3 py-2 border border-gray-300 rounded" required>
                    </div>
                    <div class="mb-4">
                        <label for="edit_description" class="block text-gray-700 font-bold mb-2">Description</label>
                        <input id="edit_description" type="hidden" name="description" x-model="formData.description" x-ref="trixInput">
                        <trix-editor input="edit_description" x-ref="trixEditor" class="trix-content border border-gray-300 rounded"></trix-editor>
                    </div>
                    <div class="mb-4">
                        <label for="edit_link" class="block text-gray-700 font-bold mb-2">Application Link</label>
                        <input type="url" id="edit_link" x-model="formData.link" class="w-full px-3 py-2 border border-gray-300 rounded" required>
                    </div>
                    <div class="flex justify-end pt-4">
                        <button type="button" @click="showEditModal = false" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded mr-2">
                            Cancel
                        </button>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


    <!-- Toast Notification -->
    <div 
        x-data="{ show: false, message: '', type: 'success' }"
        x-show="show"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 transform translate-y-2"
        x-transition:enter-end="opacity-100 transform translate-y-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 transform translate-y-0"
        x-transition:leave-end="opacity-0 transform translate-y-2"
        @notify.window="show = true; message = $event.detail.message; type = $event.detail.type; setTimeout(() => { show = false }, 3000)"
        class="fixed bottom-4 right-4 px-6 py-3 rounded-lg shadow-lg"
        :class="{'bg-green-500 text-white': type === 'success', 'bg-red-500 text-white': type === 'error'}"
        style="z-index: 60;">
        <div class="flex items-center space-x-2">
            <div x-show="type === 'success'" class="text-lg">✓</div>
            <div x-show="type === 'error'" class="text-lg">✗</div>
            <div x-text="message"></div>
        </div>
    </div>
</div>

@endsection

@section('scripts')

    <script>
        document.addEventListener("trix-change", function (e) {
    const inputId = e.target.getAttribute("input");
    const input = document.getElementById(inputId);
    input.dispatchEvent(new Event("input"));
});
        function notify(message, type = 'success') {
            window.dispatchEvent(new CustomEvent('notify', {
                detail: { message, type }
            }));
        }
    </script>
@endsection