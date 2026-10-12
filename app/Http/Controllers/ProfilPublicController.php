<?php

namespace App\Http\Controllers;

use App\Models\ProfilSekolah;
use App\Models\Guru;
use App\Models\Siswa;
use App\Models\Prestasi;
use App\Models\Ekstrakulikuler;

class ProfilPublicController extends Controller
{
    public function index()
    {
        $profil = ProfilSekolah::first();

        $jumlahGuru = Guru::count();
        $jumlahSiswa = Siswa::count();
        $jumlahPrestasi = Prestasi::count();
        $jumlahEkstrakulikuler = Ekstrakulikuler::count();

        return view('profil-public.index', [
            'profil' => $profil,
            'jumlahGuru' => $jumlahGuru,
            'jumlahSiswa' => $jumlahSiswa,
            'jumlahPrestasi' => $jumlahPrestasi,
            'jumlahEkstrakulikuler' => $jumlahEkstrakulikuler,
        ]);
    }
}
