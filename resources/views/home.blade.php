@extends('layouts.app')

@section('title', 'Beranda')

@section('content')

<p>Selamat datang di portal layanan kota. Temukan informasi dan akses layanan dari seluruh OPD di lingkungan pemerintah kota secara terpadu.</p>

<div class="opd=grid">
    <div class="opd-card">Dinas Kependudukan dan Catatan Sipil</div>
    <div class="opd-card">Dinas Kesehatan</div>
    <div class="opd-card">Dinas Komunikasi dan Informatika</div>
    <div class="opd-card">Dinas Perhubungan</div>
    <div class="opd-card">Dinas Pendidikan</div>
</div>

@endsection