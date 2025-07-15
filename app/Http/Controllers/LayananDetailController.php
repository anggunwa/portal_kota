<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Layanan;

class LayananDetailController extends Controller
{
    public function show(Layanan $layanan) {
    // pencarian berdasarkan ID
    // jika tidak ditemukan, error 404
    return view('frontend.layanans.show', compact('layanan'));
    }
}
