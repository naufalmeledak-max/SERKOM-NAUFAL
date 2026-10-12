<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    public function index()
    {
        $galeri = Galeri::all();

        return view('galeri.index', compact('galeri'));
    }

    public function create()
    {
        return view('galeri.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|max:50',
            'keterangan' => 'required',
            'file' => 'required|file|mimes:jpg,jpeg,png,webp,mp4,mov,avi|max:20480',
            'kategori' => 'required|in:Foto,Video',
            'tanggal' => 'required|date',
        ]);

        $namaFile = null;

        if ($request->hasFile('file')) {
            $file = $request->file('file');

            $namaFile = time() . '_' . $file->getClientOriginalName();

            $file->move(
                public_path('assets/images/galeri'),
                $namaFile
            );
        }

        Galeri::create([
            'judul' => $request->judul,
            'keterangan' => $request->keterangan,
            'file' => $namaFile,
            'kategori' => $request->kategori,
            'tanggal' => $request->tanggal,
        ]);

        return redirect()
            ->route('galeri.index')
            ->with('success', 'Data galeri berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        $galeri = Galeri::findOrFail($id);

        return view('galeri.show', compact('galeri'));
    }

    public function edit(string $id)
    {
        $galeri = Galeri::findOrFail($id);

        return view('galeri.edit', compact('galeri'));
    }

    public function update(Request $request, string $id)
    {
        $galeri = Galeri::findOrFail($id);

        $request->validate([
            'judul' => 'required|max:50',
            'keterangan' => 'required',
            'file' => 'nullable|file|mimes:jpg,jpeg,png,webp,mp4,mov,avi|max:20480',
            'kategori' => 'required|in:Foto,Video',
            'tanggal' => 'required|date',
        ]);

        $data = [
            'judul' => $request->judul,
            'keterangan' => $request->keterangan,
            'kategori' => $request->kategori,
            'tanggal' => $request->tanggal,
        ];

        if ($request->hasFile('file')) {

            if (
                $galeri->file &&
                file_exists(
                    public_path('assets/images/galeri/' . $galeri->file)
                )
            ) {
                unlink(
                    public_path('assets/images/galeri/' . $galeri->file)
                );
            }

            $file = $request->file('file');

            $namaFile = time() . '_' . $file->getClientOriginalName();

            $file->move(
                public_path('assets/images/galeri'),
                $namaFile
            );

            $data['file'] = $namaFile;
        }

        $galeri->update($data);

        return redirect()
            ->route('galeri.index')
            ->with('success', 'Data galeri berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $galeri = Galeri::findOrFail($id);

        if (
            $galeri->file &&
            file_exists(
                public_path('assets/images/galeri/' . $galeri->file)
            )
        ) {
            unlink(
                public_path('assets/images/galeri/' . $galeri->file)
            );
        }

        $galeri->delete();

        return redirect()
            ->route('galeri.index')
            ->with('success', 'Data galeri berhasil dihapus.');
    }
}
