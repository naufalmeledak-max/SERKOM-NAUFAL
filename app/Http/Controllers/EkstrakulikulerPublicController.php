<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakulikuler;
use App\Models\ProfilSekolah;

class EkstrakulikulerPublicController extends Controller
{
    public function index()
    {
        $profil = ProfilSekolah::first();

        $ekstrakulikuler = Ekstrakulikuler::latest('id')
            ->paginate(9);

        return view('ekstrakulikuler-public.index', compact(
            'profil',
            'ekstrakulikuler'
        ));
    }

    public function show(string $id)
    {
        $profil = ProfilSekolah::first();

        $ekstrakulikuler = Ekstrakulikuler::findOrFail($id);

        return view(
            'ekstrakulikuler-public.show',
            compact('profil', 'ekstrakulikuler')
        );
    }
}
