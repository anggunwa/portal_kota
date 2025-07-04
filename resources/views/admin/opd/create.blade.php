@extends('layouts.app')

@section('title', 'Tambah OPD')

@section('content')
    <h2>Tambah OPD</h2>

    <form action="{{ route('admin.opds.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label>Nama:</label><br>
        <input type="text" name="nama" required><br><br>

        <label>Slug:</label><br>
        <input type="text" name="slug" required><br><br>

        <label>Link:</label><br>
        <input type="url" name="link"><br><br>

        <label>Logo:</label>
        <input type="file" name="logo" accept="image/*"><br><br>

        <button type="submit">Simpan</button>
    </form>
@endsection