<?php

namespace App\Http\Controllers;

use App\Models\siswa;
use App\Models\ProfilSekolah;

class SiswaPublicController extends Controller
{
     public function index()
    {
        $profil = ProfilSekolah::first();

        $siswa = Siswa::latest('id')
            ->paginate(9);

        return view('siswa-public.index', compact(
            'profil',
            'siswa'
        ));
    }
}
