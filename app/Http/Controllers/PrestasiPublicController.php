<?php

namespace App\Http\Controllers;

use App\Models\Prestasi;
use App\Models\ProfilSekolah;

class PrestasiPublicController extends Controller
{
    public function index()
    {
        $profil = ProfilSekolah::first();

        $prestasi = Prestasi::latest('id')
            ->paginate(9);

        return view('prestasi-public.index', compact(
            'profil',
            'prestasi'
        ));
    }
     public function show(string $id)
    {
        $profil = ProfilSekolah::first();

        $prestasi = Prestasi::findOrFail($id);

        return view('prestasi-public.show', compact(
            'profil',
            'prestasi'
        ));
    }
}
