<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class BeritaController extends Controller
{
    public function index()
    {
        $berita = Berita::all();

        return view('berita.index', compact('berita'));
    }

    public function create()
    {
        return view('berita.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|max:50',
            'isi' => 'required',
            'tanggal' => 'required|date',
            'gambar' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status' => 'required|in:Publish,Draft',
        ]);

        // Upload gambar
        $gambar = $request->file('gambar');

        $namaGambar = time() . '_' . $gambar->getClientOriginalName();

        $gambar->move(
            public_path('assets/images/berita'),
            $namaGambar
        );

        // Simpan data berita
        Berita::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'tanggal' => $request->tanggal,
            'gambar' => $namaGambar,
            'id_user' => Auth::id(),
            'status' => $request->status,
        ]);

        return redirect()
            ->route('berita.index')
            ->with('success', 'Berita berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        $berita = Berita::findOrFail($id);

        return view('berita.show', compact('berita'));
    }

    public function edit(string $id)
    {
        $berita = Berita::findOrFail($id);
        return view('berita.edit', compact('berita'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'judul' => 'required|max:50',
            'isi' => 'required',
            'tanggal' => 'required|date',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status' => 'required|in:Publish,Draft',
        ]);

        $berita = Berita::findOrFail($id);

        // Data awal
        $data = [
            'judul' => $request->judul,
            'isi' => $request->isi,
            'tanggal' => $request->tanggal,
            'status' => $request->status,
        ];

        // Jika ada gambar baru
        if ($request->hasFile('gambar')) {

            // Hapus gambar lama
            $gambarLama = public_path(
                'assets/images/berita/' . $berita->gambar
            );

            if (File::exists($gambarLama)) {
                File::delete($gambarLama);
            }

            // Upload gambar baru
            $gambar = $request->file('gambar');

            $namaGambar = time() . '_' . $gambar->getClientOriginalName();

            $gambar->move(
                public_path('assets/images/berita'),
                $namaGambar
            );

            $data['gambar'] = $namaGambar;
        }

        $berita->update($data);

        return redirect()
            ->route('berita.index')
            ->with('success', 'Berita berhasil diubah.');
    }

    public function destroy(string $id)
    {
        $berita = Berita::findOrFail($id);

        // Hapus file gambar
        $gambar = public_path(
            'assets/images/berita/' . $berita->gambar
        );

        if (File::exists($gambar)) {
            File::delete($gambar);
        }

        // Hapus data berita
        $berita->delete();

        return redirect()
            ->route('berita.index')
            ->with('success', 'Berita berhasil dihapus.');
    }
}
