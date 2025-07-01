@extends('layouts.app')

@section('title', 'Edit OPD')

@section('content')
    <h2>Edit OPD</h2>

    <form action="{{ route('admin.opds.update', $opd->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Nama:</label>
        <input input="text" name="nama" value="{{ $opd->nama }}" required><br><br>

        <label>Slug:</label>
        <input input="text" name="slug" value="{{ $opd->slug }}" required><br><br>
        
        <label>Link:</label>
        <input type="url" name="link" value="{{ $opd->link }}"><br><br>
    
        <button type="submit">Update</button>
    </form>
@endsection