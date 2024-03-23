<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $mahasiswas = Mahasiswa::all()->sortByDesc('nim');
        $totalMahasiswa = Mahasiswa::count();
        $totalMahasiswaLakiLaki = Mahasiswa::where('gender', 'Laki-laki')->count();
        $totalMahasiswaPerempuan = Mahasiswa::where('gender', 'Perempuan')->count();
        return view('index', compact(['mahasiswas', 'totalMahasiswa', 'totalMahasiswaLakiLaki', 'totalMahasiswaPerempuan']));
    }
}
