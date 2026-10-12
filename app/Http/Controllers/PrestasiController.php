<?php

namespace App\Http\Controllers;

use App\Models\Prestasi;
use Illuminate\Http\Request;

class PrestasiController extends Controller
{
    public function index()
    {
        $prestasi = Prestasi::all();

        return view('prestasi.index', compact('prestasi'));
    }

    public function create()
    {
        return view('prestasi.create');
    }

   public function store(Request $request)
    {
        $request->validate([
            'nama_prestasi' => 'required|max:50',
            'nama_siswa' => 'required|max:50',
            'tingkat' => 'required|max:50',
            'peringkat' => 'required|max:50',
            'keterangan' => 'required',
            'foto' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'tahun_ajaran' => 'required|max:50',
        ]);

        $foto = null;

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');

            $namaFoto = time() . '_' . $file->getClientOriginalName();

            $file->move(
                public_path('assets/images/prestasi'),
                $namaFoto
            );

            $foto = $namaFoto;
        }

        Prestasi::create([
            'nama_prestasi' => $request->nama_prestasi,
            'nama_siswa' => $request->nama_siswa,
            'tingkat' => $request->tingkat,
            'peringkat' => $request->peringkat,
            'keterangan' => $request->keterangan,
            'foto' => $foto,
            'tahun_ajaran' => $request->tahun_ajaran,
        ]);

        return redirect()
            ->route('prestasi.index')
            ->with('success', 'Data prestasi berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        $prestasi = Prestasi::findOrFail($id);

        return view('prestasi.show', compact('prestasi'));
    }

    public function edit(string $id)
    {
        $prestasi = Prestasi::findOrFail($id);

        return view('prestasi.edit', compact('prestasi'));
    }


public function update(Request $request, string $id)
{
    $prestasi = Prestasi::findOrFail($id);

    // Validasi data
    $request->validate([
        'nama_prestasi' => 'required|string|max:50',
        'nama_siswa'    => 'required|string|max:50',
        'tingkat'       => 'required|string|max:50',
        'peringkat'     => 'required|string|max:50',
        'keterangan'    => 'required|string',
        'foto'          => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        'tahun_ajaran'  => 'required|string|max:50',
    ]);

    // Masukkan semua data yang akan diperbarui
    $data = [
        'nama_prestasi' => $request->nama_prestasi,
        'nama_siswa'    => $request->nama_siswa,
        'tingkat'       => $request->tingkat,
        'peringkat'     => $request->peringkat,
        'keterangan'    => $request->keterangan,
        'tahun_ajaran'  => $request->tahun_ajaran,
    ];

    // Proses foto baru jika diunggah
    if ($request->hasFile('foto')) {
        $file = $request->file('foto');

        $namaFoto = time() . '_' . $file->getClientOriginalName();

        $file->move(
            public_path('assets/images/prestasi'),
            $namaFoto
        );

        // Hapus foto lama setelah foto baru berhasil dipindahkan
        if (
            $prestasi->foto &&
            file_exists(
                public_path('assets/images/prestasi/' . $prestasi->foto)
            )
        ) {
            unlink(
                public_path('assets/images/prestasi/' . $prestasi->foto)
            );
        }

        $data['foto'] = $namaFoto;
    }

    // Simpan perubahan ke database
    $prestasi->update($data);

    return redirect()
        ->route('prestasi.index')
        ->with('success', 'Data prestasi berhasil diperbarui.');
}

    public function destroy(string $id)
    {
        $prestasi = Prestasi::findOrFail($id);

        if (
            $prestasi->foto &&
            file_exists(
                public_path('assets/images/prestasi/' . $prestasi->foto)
            )
        ) {
            unlink(
                public_path('assets/images/prestasi/' . $prestasi->foto)
            );
        }

        $prestasi->delete();

        return redirect()
            ->route('prestasi.index')
            ->with('success', 'Data prestasi berhasil dihapus.');
    }
}
