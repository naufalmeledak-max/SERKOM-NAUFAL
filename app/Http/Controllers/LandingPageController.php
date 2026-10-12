<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Ekstrakulikuler;
use App\Models\Galeri;
use App\Models\Guru;
use App\Models\Pengumuman;
use App\Models\Prestasi;
use App\Models\ProfilSekolah;
use App\Models\Siswa;

class LandingPageController extends Controller
{
    public function index()
    {
        $profil = ProfilSekolah::first();


        // =====================================================
        // STATISTIK
        // =====================================================

        $jumlahGuru = Guru::count();

        $jumlahSiswa = Siswa::count();

        $jumlahPrestasi = Prestasi::count();

        $jumlahEkstrakulikuler = Ekstrakulikuler::count();


        // =====================================================
        // PRESTASI
        // Ambil 9 data terbaru.
        // Landing tetap menampilkan 3 data per slide.
        // =====================================================

        $prestasiTerbaru = Prestasi::latest('id')
            ->take(9)
            ->get();


        // =====================================================
        // EKSTRAKULIKULER
        // =====================================================

        $ekstrakulikulerTerbaru = Ekstrakulikuler::latest('id')
            ->take(9)
            ->get();


        // =====================================================
        // GURU
        // =====================================================

        $guruTerbaru = Guru::latest('id')
            ->take(9)
            ->get();


        // =====================================================
        // GALERI
        // =====================================================

        $galeriTerbaru = Galeri::where('kategori', 'Foto')
            ->latest('id')
            ->take(9)
            ->get();


        // =====================================================
        // BERITA
        // =====================================================

        $beritaTerbaru = Berita::where('status', 'Publish')
            ->latest('tanggal')
            ->take(9)
            ->get();


        // =====================================================
        // PENGUMUMAN
        // =====================================================

        $pengumumanTerbaru = Pengumuman::where('status', 'Publish')
            ->latest('tanggal')
            ->take(9)
            ->get();


        return view('landing.index', [

            'profil' => $profil,

            'jumlahGuru' => $jumlahGuru,

            'jumlahSiswa' => $jumlahSiswa,

            'jumlahPrestasi' => $jumlahPrestasi,

            'jumlahEkstrakulikuler' => $jumlahEkstrakulikuler,

            'prestasiTerbaru' => $prestasiTerbaru,

            'ekstrakulikulerTerbaru' => $ekstrakulikulerTerbaru,

            'guruTerbaru' => $guruTerbaru,

            'galeriTerbaru' => $galeriTerbaru,

            'beritaTerbaru' => $beritaTerbaru,

            'pengumumanTerbaru' => $pengumumanTerbaru,

        ]);
    }
}
