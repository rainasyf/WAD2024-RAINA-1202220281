@extends('layout.app')

@section('title', 'Edit Dosen')
@section('page-title', 'Edit Dosen')

@section('content')
<div class="container">
    <form action="{{ route('dosens.update', $dosen->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card">
            <div class="card-header">Form Edit Dosen</div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="kode_dosen" class="form-label">Kode Dosen</label>
                    <input type="text" name="kode_dosen" class="form-control" value="{{ $dosen->kode_dosen }}" required>
                </div>
                <div class="mb-3">
                    <label for="nama_dosen" class="form-label">Nama Dosen</label>
                    <input type="text" name="nama_dosen" class="form-control" value="{{ $dosen->nama_dosen }}" required>
                </div>
                <div class="mb-3">
                    <label for="nip" class="form-label">NIP</label>
                    <input type="text" name="nip" class="form-control" value="{{ $dosen->nip }}" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ $dosen->email }}" required>
                </div>
                <div class="mb-3">
                    <label for="no_telepon" class="form-label">No Telepon</label>
                    <input type="text" name="no_telepon" class="form-control" value="{{ $dosen->no_telepon }}">
                </div>
                <button type="submit" class="btn btn-success">Simpan Perubahan</button>
            </div>
        </div>
    </form>
</div>
@endsection
