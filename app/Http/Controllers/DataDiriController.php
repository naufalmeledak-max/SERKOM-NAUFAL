<?php

namespace App\Http\Controllers;

use App\Models\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DataDiriController extends Controller
{
    private function fotoFolder(): string
    {
        return public_path('assets/images/data');
    }

    private function simpanFoto(\Illuminate\Http\UploadedFile $foto): string
    {
        $folder = $this->fotoFolder();

        if (!File::isDirectory($folder)) {
            File::makeDirectory($folder, 0755, true);
        }

        // Nama pendek dan unik, agar tidak melebihi kolom foto varchar(50).
        $namaFoto = bin2hex(random_bytes(12)) . '.' . $foto->extension();
        $foto->move($folder, $namaFoto);

        return $namaFoto;
    }

    private function hapusFoto(?string $namaFoto): void
    {
        if (!$namaFoto) {
            return;
        }

        // Hanya hapus file di folder foto Data Diri, bukan lokasi lain.
        $path = $this->fotoFolder() . DIRECTORY_SEPARATOR . basename($namaFoto);

        if (File::exists($path) && File::isFile($path)) {
            File::delete($path);
        }
    }

    public function index()
     {
        $dataDiri = data::latest('id')->paginate(10);

        return view('data-admin.index', compact('dataDiri'));
    }

    public function create()
    {
        return view('data-admin.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_lengkap' => ['required', 'string', 'max:50'],
            'kelas' => ['required', 'string', 'max:50'],
            'foto' => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        $validated['foto'] = $this->simpanFoto($request->file('foto'));

        Data::create($validated);

        return redirect()
            ->route('data-admin.index')
            ->with('success', 'Data diri berhasil ditambahkan.');
    }

    public function show(int $id)
    {
        $item = Data::findOrFail($id);

        return view('data-admin.show', compact('item'));
    }

    public function edit($id)
    {
        $dataDiri = data::findOrFail($id);

        return view('data-admin.edit', compact('dataDiri'));
    }

    public function update(Request $request, int $id)
    {
        $item = Data::findOrFail($id);

        $validated = $request->validate([
            'nama_lengkap' => ['required', 'string', 'max:50'],
            'kelas' => ['required', 'string', 'max:50'],
            'foto' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        $fotoLama = $item->foto;

        if ($request->hasFile('foto')) {
            $validated['foto'] = $this->simpanFoto($request->file('foto'));
        } else {
            unset($validated['foto']);
        }

        $item->update($validated);

        if ($request->hasFile('foto')) {
            $this->hapusFoto($fotoLama);
        }

        return redirect()
            ->route('data-admin.index')
            ->with('success', 'Data diri berhasil diperbarui.');
    }

    public function destroy(int $id)
    {
        $item = Data::findOrFail($id);
        $fotoLama = $item->foto;

        $item->delete();
        $this->hapusFoto($fotoLama);

        return redirect()
            ->route('data-admin.index')
            ->with('success', 'Data diri berhasil dihapus.');
    }
}
