@extends('layouts.main')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-semibold text-gray-800 dark:text-white mb-6">Daftar Proyek</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach ($projects as $project)
        <div class="max-w-xs overflow-hidden ">
            <!-- Gambar dengan link -->
            <a href="{{ $project->link }}" class="block">
                <img src="{{ Storage::url($project->image) }}" alt="{{ $project->name }}"
                    class="w-full h-48 rounded-sm object-cover ">
            </a>

            <div class="py-2">
                <!-- Nama Proyek -->
                <h2 class="text-xl font-bold text-gray-800 dark:text-white">{{ Str::limit($project->name, 20) }}</h2>

                <!-- Deskripsi -->
                <p class="text-gray-600 dark:text-gray-300 text-sm mt-2">{{ Str::limit($project->description, 30) }}</p>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection