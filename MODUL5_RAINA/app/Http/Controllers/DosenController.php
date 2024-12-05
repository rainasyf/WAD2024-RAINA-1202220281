<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    // Tampilkan semua data dosen
    public function index()
    {
        $dosens = Dosen::all();
        return view('dosens.index', compact('dosens'));
    }

    // Tampilkan form tambah dosen
    public function create()
    {
        return view('dosens.create');
    }

    // Simpan data dosen baru
    public function store(Request $request)
    {
        $request->validate([
            'kode_dosen' => 'required|unique:dosens|max:3',
            'nama_dosen' => 'required',
            'nip' => 'required|unique:dosens',
            'email' => 'required|email|unique:dosens',
            'no_telepon' => 'nullable',
        ]);

        Dosen::create($request->all());
        return redirect()->route('dosens.index')->with('success', 'Dosen berhasil ditambahkan.');
    }

    // Tampilkan form edit dosen
    public function edit($id)
    {
        $dosen = Dosen::findOrFail($id);
        return view('dosens.edit', compact('dosen'));
    }

    // Perbarui data dosen
    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_dosen' => 'required|max:3|unique:dosens,kode_dosen,' . $id,
            'nama_dosen' => 'required',
            'nip' => 'required|unique:dosens,nip,' . $id,
            'email' => 'required|email|unique:dosens,email,' . $id,
            'no_telepon' => 'nullable',
        ]);

        $dosen = Dosen::findOrFail($id);
        $dosen->update($request->all());
        return redirect()->route('dosens.index')->with('success', 'Dosen berhasil diperbarui.');
    }

    // Hapus data dosen
    public function destroy($id)
    {
        $dosen = Dosen::findOrFail($id);
        $dosen->delete();
        return redirect()->route('dosens.index')->with('success', 'Dosen berhasil dihapus.');
    }
    public function show($id)
    {
        $dosen = Dosen::findOrFail($id);
        return view('dosens.show', compact('dosen'));
    }
}
