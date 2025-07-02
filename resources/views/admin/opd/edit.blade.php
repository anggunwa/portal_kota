@extends('layouts.app')

@section('title', 'Edit OPD')

@section('content')
    <h2>Edit OPD</h2>

    <form action="{{ route('admin.opds.update', $opd->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label>Nama:</label>
        <input input="text" name="nama" value="{{ $opd->nama }}" required><br><br>

        <label>Slug:</label>
        <input input="text" name="slug" value="{{ $opd->slug }}" required><br><br>
        
        <label>Link:</label>
        <input type="url" name="link" value="{{ $opd->link }}"><br><br>
    
        <label>Logo Baru:</label>
        <input type="file" name="logo" accept="image/*"><br><br>

        @if ($opd->logo)
            <p>Logo Saat Ini:</p>
            <img src="{{ asset($opd->logo) }}" alt="Logo OPD" width="100">
        @endif

        <button type="submit">Update</button>
    </form>
@endsection