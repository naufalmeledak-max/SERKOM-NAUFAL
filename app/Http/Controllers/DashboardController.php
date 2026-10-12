<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Siswa;
use App\Models\Prestasi;
use App\Models\Ekstrakulikuler;
use App\Models\Galeri;
use App\Models\Berita;
use App\Models\Pengumuman;

class DashboardController extends Controller
{
    public function index()
    {
        // =========================
        // JUMLAH DATA
        // =========================

        $jumlahGuru = Guru::count();

        $jumlahSiswa = Siswa::count();

        $jumlahPrestasi = Prestasi::count();

        $jumlahEkstrakulikuler = Ekstrakulikuler::count();


        // =========================
        // 3 DATA TERBARU
        // =========================

        $prestasiTerbaru = Prestasi::latest('created_at')
            ->take(3)
            ->get();

        $galeriTerbaru = Galeri::latest('created_at')
            ->take(3)
            ->get();

        $beritaTerbaru = Berita::latest('created_at')
            ->take(3)
            ->get();

        $pengumumanTerbaru = Pengumuman::latest('created_at')
            ->take(3)
            ->get();


        // =========================
        // KIRIM KE DASHBOARD
        // =========================

        return view('dashboard', compact(
            'jumlahGuru',
            'jumlahSiswa',
            'jumlahPrestasi',
            'jumlahEkstrakulikuler',
            'prestasiTerbaru',
            'galeriTerbaru',
            'beritaTerbaru',
            'pengumumanTerbaru'
        ));
    }
}
