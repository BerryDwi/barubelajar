<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class TabelmahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswa = Mahasiswa::all();
        return view('tabel_mahasiswa.tabel', compact('mahasiswa'));
    }
    public function create()
    {
        return view('tabel_mahasiswa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nim' => 'required',
            'kelas' => 'required',
        ]);

        Mahasiswa::create($request->all());
        return redirect()->route('tabelmahasiswa')->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        return view('tabel_mahasiswa.edit', compact('mahasiswa'));
    }

   public function update(Request $request, $id)
{
    $mahasiswa = Mahasiswa::findOrFail($id);
    $mahasiswa->nama = $request->nama;
    $mahasiswa->nim = $request->nim;
    $mahasiswa->kelas = $request->kelas;
    $mahasiswa->save();

    return redirect()->route('tabelmahasiswa')->with('success', 'Data berhasil diupdate');
}

    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->delete();

        return redirect()->route('tabelmahasiswa')->with('success', 'Data berhasil dihapus.');
    }
}
