<?php

namespace App\Http\Controllers;

use App\Models\data;
use App\Models\ProfilSekolah;

class DataController extends Controller
{
       public function index()
    {
        $profil = ProfilSekolah::first();

        $data = data::latest('id')
            ->paginate(9);

        return view('data-public.index', compact(
            'profil',
            'data'
        ));
    }
}
