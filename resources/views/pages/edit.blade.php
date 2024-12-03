@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-semibold text-gray-800 mb-6">EDIT PROJECT : {{ $project->name }}</h1>

    <!-- Menampilkan error jika ada -->
    @if($errors->any())
    <div class="mb-4 p-4 bg-red-100 text-red-700 border border-red-300 rounded">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="bg-white p-6 rounded-md shadow-md">
        <form action="{{ route('projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Nama Proyek -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Nama Proyek</label>
                <input type="text" name="name" id="name" class="mt-1 block w-full p-2 border border-gray-300 rounded "
                    value="{{ old('name', $project->name) }}" required>
                @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Deskripsi -->
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                <textarea name="description" id="description"
                    class="mt-1 block w-full p-2 border border-gray-300 rounded "
                    required>{{ old('description', $project->description) }}</textarea>
                @error('description')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Link -->
            <div class="mb-4">
                <label for="link" class="block text-sm font-medium text-gray-700">Link</label>
                <input type="url" name="link" id="link" class="mt-1 block w-full p-2 border border-gray-300 rounded "
                    value="{{ old('link', $project->link) }}" required>
                @error('link')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Gambar -->
            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-gray-700">Gambar</label>
                <input type="file" name="image" id="image"
                    class="mt-1 block w-full p-2 border border-gray-300 rounded ">
                @error('image')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Menampilkan gambar yang ada -->
            @if($project->image)
            <div class="mb-4">
                <p>Gambar saat ini:</p>
                <img src="{{ Storage::url($project->image) }}" alt="Gambar Proyek "
                    class="w-40 pt-2 object-cover shadow-md">
            </div>
            @endif

            <!-- Tombol Simpan -->
            <button type="submit"
                class="mt-4 px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                Simpan Perubahan
            </button>
        </form>
    </div>
</div>
@endsection