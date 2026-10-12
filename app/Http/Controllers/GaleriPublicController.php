<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use App\Models\ProfilSekolah;

class GaleriPublicController extends Controller
{
    public function index()
    {
        $profil = ProfilSekolah::first();

        $galeri = Galeri::latest('id')
            ->paginate(9);

        return view('galeri-public.index', compact(
            'profil',
            'galeri'
        ));
    }

    public function show(string $id)
    {
        $profil = ProfilSekolah::first();

        $galeri = Galeri::findOrFail($id);

        return view('galeri-public.show', compact(
            'profil',
            'galeri'
        ));
    }
}
