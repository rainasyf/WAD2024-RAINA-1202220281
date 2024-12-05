<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Dosen;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    // Tampilkan semua data mahasiswa
    public function index()
    {
        $mahasiswas = Mahasiswa::with('dosen')->get();
        return view('mahasiswas.index', compact('mahasiswas'));
    }

    // Tampilkan form tambah mahasiswa
    public function create()
    {
        $dosens = Dosen::all();
        return view('mahasiswas.create', compact('dosens'));
    }

    // Simpan data mahasiswa baru
    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required|unique:mahasiswas',
            'nama_mahasiswa' => 'required',
            'email' => 'required|email|unique:mahasiswas',
            'jurusan' => 'required',
            'dosen_id' => 'required|exists:dosens,id',
        ]);

        Mahasiswa::create($request->all());
        return redirect()->route('mahasiswas.index')->with('success', 'Mahasiswa berhasil ditambahkan.');
    }

    // Tampilkan form edit mahasiswa
    public function edit($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $dosens = Dosen::all();
        return view('mahasiswas.edit', compact('mahasiswa', 'dosens'));
    }

    // Perbarui data mahasiswa
    public function update(Request $request, $id)
    {
        $request->validate([
            'nim' => 'required|unique:mahasiswas,nim,' . $id,
            'nama_mahasiswa' => 'required',
            'email' => 'required|email|unique:mahasiswas,email,' . $id,
            'jurusan' => 'required',
            'dosen_id' => 'required|exists:dosens,id',
        ]);

        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->update($request->all());
        return redirect()->route('mahasiswas.index')->with('success', 'Mahasiswa berhasil diperbarui.');
    }

    // Hapus data mahasiswa
    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->delete();
        return redirect()->route('mahasiswas.index')->with('success', 'Mahasiswa berhasil dihapus.');
    }
    public function show($id)
    {
        $mahasiswa = Mahasiswa::with('dosen')->findOrFail($id); // Include dosen wali in details
        return view('mahasiswas.show', compact('mahasiswa'));
    }
}
