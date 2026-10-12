<?php

namespace App\Http\Controllers;

use App\Models\guru;
use App\Models\mapel;
use Illuminate\Http\Request;

class GuruController extends Controller
{
  public function index()
    {
        $guru = Guru::all();

        return view('guru.index', compact('guru'));
    }
    public function create()
    {
        $mapel = Mapel::orderBy('nama_mapel')->get();

        return view('guru.create', compact('mapel'));
    }

   public function store(Request $request)
{
    $request->validate([
        'nama_guru' => 'required|max:50',
        'nip' => 'required|max:15',
        'mapel' => 'required|max:40',
        'foto' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    $foto = null;

    if ($request->hasFile('foto')) {
        $foto = $request->file('foto')->getClientOriginalName();

        $request->file('foto')->move(
            public_path('assets/images/guru'),
            $foto
        );
    }

    Guru::create([
        'nama_guru' => $request->nama_guru,
        'nip' => $request->nip,
        'mapel' => $request->mapel,
        'foto' => $foto,
    ]);

    return redirect()
        ->route('guru.index')
        ->with('success', 'Data guru berhasil ditambahkan.');
    }

   public function update(Request $request, string $id)
{
    $guru = Guru::findOrFail($id);

    $request->validate([
        'nama_guru' => 'required|max:50',
        'nip' => 'required|max:15',
        'mapel' => 'required|max:40',
        'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    $data = [
        'nama_guru' => $request->nama_guru,
        'nip' => $request->nip,
        'mapel' => $request->mapel,
    ];

    if ($request->hasFile('foto')) {

        // Hapus foto lama
        if ($guru->foto && file_exists(public_path('assets/images/guru/' . $guru->foto))) {
            unlink(public_path('assets/images/guru/' . $guru->foto));
        }

        // Simpan foto baru
        $foto = $request->file('foto');
        $namaFoto = time() . '_' . $foto->getClientOriginalName();

        $foto->move(
            public_path('assets/images/guru'),
            $namaFoto
        );

        $data['foto'] = $namaFoto;
    }

    $guru->update($data);

    return redirect()
        ->route('guru.index')
        ->with('success', 'Data guru berhasil diperbarui.');
    }

    public function edit(string $id)
    {
        $guru = Guru::findOrFail($id);

        return view('guru.edit', compact('guru'));
    }

    public function show(string $id)
    {
        $guru = Guru::findOrFail($id);

        return view('guru.show', compact('guru'));
    }

    public function destroy(string $id)
    {
        $guru = guru::findOrFail($id);

        $guru->delete();

        return redirect()
            ->route('guru.index')
            ->with('success', 'Data guru berhasil dihapus.');
    }
}
