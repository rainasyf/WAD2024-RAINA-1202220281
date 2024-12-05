@extends('layout.app')

@section('title', 'Daftar Mahasiswa')
@section('page-title', 'Daftar Mahasiswa')

@section('content')
<div class="container">
    <a href="{{ route('mahasiswas.create') }}" class="btn btn-primary mb-3">Tambah Mahasiswa</a>
    <div class="card">
        <div class="card-header">Daftar Mahasiswa</div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Jurusan</th>
                        <th>Dosen Wali</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mahasiswas as $key => $mahasiswa)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $mahasiswa->nim }}</td>
                        <td>{{ $mahasiswa->nama_mahasiswa }}</td>
                        <td>{{ $mahasiswa->email }}</td>
                        <td>{{ $mahasiswa->jurusan }}</td>
                        <td>{{ $mahasiswa->dosen->nama_dosen }}</td>
                        <td>
                            <a href="{{ route('mahasiswas.show', $mahasiswa->id) }}" class="btn btn-info btn-sm">Detail</a>
                            <a href="{{ route('mahasiswas.edit', $mahasiswa->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('mahasiswas.destroy', $mahasiswa->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
