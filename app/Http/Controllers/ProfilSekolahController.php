<?php

namespace App\Http\Controllers;

use App\Models\ProfilSekolah;
use Illuminate\Http\Request;

class ProfilSekolahController extends Controller
{
    /**
     * Menampilkan data profil sekolah.
     */
    public function index()
    {
        $profil = ProfilSekolah::all();

        return view('profil_sekolah.index', compact('profil'));
    }


    /**
     * Menyimpan data profil sekolah baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_sekolah' => 'required|max:100',
            'kepala_sekolah' => 'required|max:100',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'npsn' => 'required|max:20',
            'alamat' => 'required',
            'kontak' => 'required|max:20',
            'visi_misi' => 'required',
            'tahun_berdiri' => 'required|digits:4',
            'deskripsi' => 'required',
        ]);

        $data = [
            'nama_sekolah' => $request->nama_sekolah,
            'kepala_sekolah' => $request->kepala_sekolah,
            'npsn' => $request->npsn,
            'alamat' => $request->alamat,
            'kontak' => $request->kontak,
            'visi_misi' => $request->visi_misi,
            'tahun_berdiri' => $request->tahun_berdiri,
            'deskripsi' => $request->deskripsi,
        ];

        // Upload logo
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');

            $namaLogo = time() . '_logo.' . $logo->getClientOriginalExtension();

            $logo->move(
                public_path('assets/images/sekolah'),
                $namaLogo
            );

            $data['logo'] = $namaLogo;
        }

        // Upload foto sekolah
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');

            $namaFoto = time() . '_foto.' . $foto->getClientOriginalExtension();

            $foto->move(
                public_path('assets/images/sekolah'),
                $namaFoto
            );

            $data['foto'] = $namaFoto;
        }

        ProfilSekolah::create($data);

        return redirect()
            ->route('profil-sekolah.index')
            ->with('success', 'Profil sekolah berhasil ditambahkan.');
    }


    /**
     * Menampilkan form edit profil sekolah.
     */
    public function edit(string $id)
    {
        $profil = ProfilSekolah::findOrFail($id);

        return view('profil_sekolah.edit', compact('profil'));
    }

    /**
     * Mengupdate data profil sekolah.
     */
    public function update(Request $request, string $id)
    {
        $profil = ProfilSekolah::findOrFail($id);

        $request->validate([
            'nama_sekolah' => 'required|max:100',
            'kepala_sekolah' => 'required|max:100',
            'npsn' => 'required|max:20',
            'alamat' => 'required',
            'kontak' => 'required|max:20',
            'visi_misi' => 'required',
            'tahun_berdiri' => 'required|digits:4',
            'deskripsi' => 'required',

            'logo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        // Data biasa
        $profil->nama_sekolah = $request->nama_sekolah;
        $profil->kepala_sekolah = $request->kepala_sekolah;
        $profil->npsn = $request->npsn;
        $profil->alamat = $request->alamat;
        $profil->kontak = $request->kontak;
        $profil->visi_misi = $request->visi_misi;
        $profil->tahun_berdiri = $request->tahun_berdiri;
        $profil->deskripsi = $request->deskripsi;

        // Upload logo
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');

            $namaLogo = time() . '_logo.' . $logo->getClientOriginalExtension();

            $logo->move(
                public_path('assets/images/sekolah'),
                $namaLogo
            );

            $profil->logo = $namaLogo;
        }

        // Upload foto sekolah
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');

            $namaFoto = time() . '_foto.' . $foto->getClientOriginalExtension();

            $foto->move(
                public_path('assets/images/sekolah'),
                $namaFoto
            );

            $profil->foto = $namaFoto;
        }

        $profil->save();

        return redirect()
            ->route('profil-sekolah.index')
            ->with('success', 'Profil sekolah berhasil diperbarui.');
    }

    /**
     * Menghapus profil sekolah.
     */
    public function destroy(string $id)
    {
        $profil = ProfilSekolah::findOrFail($id);

        $profil->delete();

        return redirect()
            ->route('profil-sekolah.index')
            ->with('success', 'Profil sekolah berhasil dihapus.');
    }
}
