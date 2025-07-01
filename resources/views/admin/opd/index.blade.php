@extends('layouts.app')

@section('title', 'Daftar OPD (Admin)')

@section('content')
    <h2>Manajemen OPD</h2>

    <a href="{{ route('admin.opds.create') }}">+ Tambah OPD Baru</a>

    <table border="1" cellpadding="8" cellspacing="0" style="margin-top: 20px; width: 100%; background: white;">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Slug</th>
                <th>Link</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($opds as $index => $opd)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $opd->nama }}</td>
                    <td>{{ $opd->slug }}</td>
                    <td><a href="{{ $opd->link }}" target="_blank">{{ $opd->link }}</a></td>
                    <td>
                        <a href="{{ route('admin.opds.edit', $opd->id) }}">Edit</a> | 
                        <form action="{{ route('admin.opds.destroy', $opd->id) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Hapus OPD ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5">Belum ada data OPD.</td></tr>
            @endforelse    
        </tbody>
    </table>
@endsection