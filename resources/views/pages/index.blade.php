@extends('layouts.app')

@section('content')

@if(session('success'))
<div class="alert alert-success mb-4 p-4 bg-green-100 text-green-700 rounded">
    {{ session('success') }}
</div>
@endif

<div class="container mx-auto p-6">
    <h1 class="text-3xl font-semibold text-gray-800 mb-6">Project List</h1>


    <div class=" bg-white p-6 rounded-md shadow-xl">
        <!-- Tombol Tambah Project -->
        <a href="{{ route('projects.create') }}"
            class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 mb-4 inline-block">Tambah Proyek</a>
        <div class="overflow-x-auto ">
            <table class="min-w-full text-sm text-gray-700">
                <thead class=" text-gray-900">
                    <tr class="border bg-gray-200 border-gray-300">
                        <th class="px-6 py-3 text-left  border border-gray-300">No</th>
                        <th class="px-6 py-3 text-left  border border-gray-300">Nama Project</th>
                        <th class="px-6 py-3 text-left  border border-gray-300">Deskripsi</th>
                        <th class="px-6 py-3 text-left  border border-gray-300">Link</th>
                        <th class="px-6 py-3 text-left  border border-gray-300">Gambar</th>
                        <th class="px-6 py-3 text-left  border border-gray-300">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $index => $project)
                    <tr class="border hover:bg-gray-50">
                        <td class="px-6 py-4 border border-gray-300">{{ $index + 1 }}</td>
                        <td class="px-6 py-4 border border-gray-300">{{ $project->name }}</td>
                        <td class="px-6 py-4 border border-gray-300">{{ $project->description }}</td>
                        <td class="px-6 py-4 border border-gray-300">
                            <a href="{{ $project->link }}" class="text-blue-600 hover:text-blue-800"
                                target="_blank">Lihat
                                Project</a>
                        </td>
                        <td class="px-6 py-4 border border-gray-300">
                            <img src="{{ Storage::url($project->image) }}" alt="Gambar Proyek"
                                class="w-20 object-cover shadow-md">
                        </td>
                        <td class="px-6 py-4 border border-gray-300 text-center">
                            <!-- Tombol Edit -->
                            <a href="{{ route('projects.edit', $project->id) }}"
                                class="bg-blue-500 hover:bg-blue-700 text-white py-1.5 px-3 rounded-md inline-block">Edit</a>
                            <!-- Tombol Hapus (dalam form) -->
                            <form action="{{ route('projects.destroy', $project->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-red-500 hover:bg-red-700 text-white py-1.5 px-3 rounded-md inline-block">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection