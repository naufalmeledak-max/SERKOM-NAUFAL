<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Pengumuman;
use App\Models\ProfilSekolah;

class BeritaPublicController extends Controller
{
    public function index()
    {
        $profil = ProfilSekolah::first();


        // =====================================================
        // BERITA
        // =====================================================

        $berita = Berita::where('status', 'Publish')
            ->latest('tanggal')
            ->paginate(
                6,
                ['*'],
                'berita_page'
            );


        // =====================================================
        // PENGUMUMAN
        // =====================================================

        $pengumuman = Pengumuman::where('status', 'Publish')
            ->latest('tanggal')
            ->paginate(
                6,
                ['*'],
                'pengumuman_page'
            );


        return view(
            'berita-public.index',
            compact(
                'profil',
                'berita',
                'pengumuman'
            )
        );
    }


    public function show(string $id)
    {
        $profil = ProfilSekolah::first();

        $berita = Berita::where('status', 'Publish')
            ->findOrFail($id);

        return view(
            'berita-public.show',
            compact(
                'profil',
                'berita'
            )
        );
    }
}
