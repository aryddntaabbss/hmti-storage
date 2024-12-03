<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class HomeController extends Controller
{
    /**
     * Tampilkan halaman index.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Mengambil semua proyek dari database
        $projects = Project::all();

        // Mengirim data proyek ke view
        return view('index', compact('projects'));
    }
}
