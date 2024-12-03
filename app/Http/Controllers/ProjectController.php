<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    // Menampilkan halaman manajemen proyek
    public function index()
    {
        // Mengambil semua proyek dari database
        $projects = Project::all();

        // Mengirim data proyek ke view
        return view('pages.index', compact('projects'));
    }

    // Menyimpan proyek baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'link' => 'required|url',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi gambar
        ]);

        // Menangani gambar jika ada
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public'); // Menyimpan gambar
        }

        // Menyimpan data proyek baru
        Project::create([
            'name' => $request->name,
            'description' => $request->description,
            'link' => $request->link,
            'image' => $imagePath,
        ]);

        return redirect()->route('pages.index')->with('success', 'Proyek berhasil ditambahkan!');
    }

    // Menampilkan form untuk menambah proyek
    public function create()
    {
        return view('pages.create');  // Mengarah ke halaman create.blade.php
    }

    public function edit($id)
    {
        $project = Project::findOrFail($id);
        return view('pages.edit', compact('project'));
    }

    // Method untuk memperbarui data project
    public function update(Request $request, $id)
    {
        // Validasi data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'link' => 'required|url',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        // Ambil proyek yang akan diubah
        $project = Project::findOrFail($id);
        $project->name = $validated['name'];
        $project->description = $validated['description'];
        $project->link = $validated['link'];

        // Menangani upload gambar (jika ada)
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $project->image = $imagePath;
        }

        // Simpan perubahan
        $project->save();

        return redirect()->route('pages.index')->with('success', 'Proyek berhasil diperbarui!');
    }

    // Menghapus proyek
    public function destroy($id)
    {
        $project = Project::findOrFail($id);

        // Menghapus gambar jika ada
        if ($project->image) {
            Storage::delete($project->image);
        }

        // Menghapus proyek dari database
        $project->delete();

        return redirect()->route('pages.index')->with('success', 'Proyek berhasil dihapus!');
    }
}
