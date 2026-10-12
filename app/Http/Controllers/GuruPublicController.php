<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\ProfilSekolah;

class GuruPublicController extends Controller
{
    public function index()
    {
        $profil = ProfilSekolah::first();

        $guru = Guru::latest('id')
            ->paginate(9);

        return view('guru-public.index', compact(
            'profil',
            'guru'
        ));
    }

    public function show(string $id)
    {
        $profil = ProfilSekolah::first();

        $guru = Guru::findOrFail($id);

        return view('guru-public.show', compact(
            'profil',
            'guru'
        ));
    }
}
