<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakulikuler;
use Illuminate\Http\Request;

class EkstrakulikulerController extends Controller
{
    public function index()
    {
       $ekstrakulikuler = Ekstrakulikuler::all();

        return view('ekstrakulikuler.index', compact('ekstrakulikuler'));
    }

    public function create()
    {
        return view('ekstrakulikuler.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_eskul' => 'required|max:50',
            'pembina' => 'required|max:50',
            'jadwal_latihan' => 'required|max:50',
            'deskripsi' => 'required',
            'gambar' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $gambar = null;

        if ($request->hasFile('gambar')) {

            $file = $request->file('gambar');

            $namaGambar = time() . '_' . $file->getClientOriginalName();

            $file->move(
                public_path('assets/images/ekstrakulikuler'),
                $namaGambar
            );

            $gambar = $namaGambar;
        }

        Ekstrakulikuler::create([
            'nama_eskul' => $request->nama_eskul,
            'pembina' => $request->pembina,
            'jadwal_latihan' => $request->jadwal_latihan,
            'deskripsi' => $request->deskripsi,
            'gambar' => $gambar,
        ]);

        return redirect()
            ->route('ekstrakulikuler.index')
            ->with('success', 'Data ekstrakulikuler berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        $ekstrakulikuler = Ekstrakulikuler::findOrFail($id);

        return view('ekstrakulikuler.show', compact('ekstrakulikuler'));
    }

    public function edit(string $id)
    {
        $ekstrakulikuler = Ekstrakulikuler::findOrFail($id);

        return view('ekstrakulikuler.edit', compact('ekstrakulikuler'));
    }

    public function update(Request $request, string $id)
    {
        $ekstrakulikuler = Ekstrakulikuler::findOrFail($id);

        $request->validate([
            'nama_eskul' => 'required|max:50',
            'pembina' => 'required|max:50',
            'jadwal_latihan' => 'required|max:50',
            'deskripsi' => 'required',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = [
            'nama_eskul' => $request->nama_eskul,
            'pembina' => $request->pembina,
            'jadwal_latihan' => $request->jadwal_latihan,
            'deskripsi' => $request->deskripsi,
        ];

       if ($request->hasFile('gambar')) {

    $file = $request->file('gambar');

    // Buat nama gambar acak yang pendek dan unik
    $namaGambar = bin2hex(random_bytes(12)) . '.' . $file->extension();

    $folderGambar = public_path('assets/images/ekstrakulikuler');

    // Simpan gambar baru
    $file->move($folderGambar, $namaGambar);

    // Simpan nama file baru untuk database
        $data['gambar'] = $namaGambar;
    }

    // Simpan perubahan terlebih dahulu
    $gambarLama = $ekstrakulikuler->gambar;

    $ekstrakulikuler->update($data);

    // Hapus gambar lama setelah update berhasil
    if (
        $request->hasFile('gambar') &&
        $gambarLama &&
        $gambarLama !== $data['gambar'] &&
        file_exists(
            public_path('assets/images/ekstrakulikuler/' . $gambarLama)
        )
    ) {
        unlink(
            public_path('assets/images/ekstrakulikuler/' . $gambarLama)
        );
    }

        $ekstrakulikuler->update($data);

        return redirect()
            ->route('ekstrakulikuler.index')
            ->with('success', 'Data ekstrakulikuler berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $ekstrakulikuler = Ekstrakulikuler::findOrFail($id);

        // Hapus gambar
        if (
            $ekstrakulikuler->gambar &&
            file_exists(
                public_path(
                    'assets/images/ekstrakulikuler/' .
                    $ekstrakulikuler->gambar
                )
            )
        ) {
            unlink(
                public_path(
                    'assets/images/ekstrakulikuler/' .
                    $ekstrakulikuler->gambar
                )
            );
        }

        $ekstrakulikuler->delete();

        return redirect()
            ->route('ekstrakulikuler.index')
            ->with('success', 'Data ekstrakulikuler berhasil dihapus.');
    }
}
