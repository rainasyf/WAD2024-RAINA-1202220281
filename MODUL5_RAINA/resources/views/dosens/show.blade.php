@extends('layout.app')

@section('title', 'Detail Dosen')
@section('page-title', 'Detail Dosen')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Detail Dosen</div>
        <div class="card-body">
            <p><strong>Kode Dosen:</strong> {{ $dosen->kode_dosen }}</p>
            <p><strong>Nama:</strong> {{ $dosen->nama_dosen }}</p>
            <p><strong>NIP:</strong> {{ $dosen->nip }}</p>
            <p><strong>Email:</strong> {{ $dosen->email }}</p>
            <p><strong>No Telepon:</strong> {{ $dosen->no_telepon }}</p>
            <a href="{{ route('dosens.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection
