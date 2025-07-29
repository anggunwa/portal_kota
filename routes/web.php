<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use App\Models\OPD;
use App\Http\Controllers\Admin\OPDController;
use App\Http\Controllers\Admin\LayananController;
use App\Http\Controllers\LayananDetailController;

Route::get('/', function () {
    $keyword = request('q');

    $opds = OPD::all();
    $opds = OPD::where('nama', 'like', "%$keyword%")->orWhere('deskripsi', 'like', "%$keyword%")
        ->orWhereHas('layanans', function ($query) use ($keyword) {
            $query->where('nama_layanan', 'like', "%$keyword%")
                ->orWhere('deskripsi', 'like', "%$keyword%")
                ->orWhere('link', 'like', "%$keyword%");
    })
    ->get();

    return view('frontend.index', compact('opds'));
})->name('home');

// Halaman Tentang
Route::get('/tentang', function () {
    return view('frontend.tentang');
})->name('tentang');

// Halaman Kontak
Route::get('/kontak', function () {
    return view('frontend.kontak');
})->name('kontak');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::view('/', 'welcome')->name('beranda');
// Route::view('/tentang', 'tentang')->name('tentang');
// Route::view('/kontak', 'kontak')->name('kontak');


Route::get('/layanan/{layanan}', [LayananDetailController::class, 'show'])->name('layanan.show');
Route::get('/opd/{id}/layanans', [LayananController::class, 'getByOpd']);


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function() {
    Route::resource('opds', OPDController::class);
    Route::resource('layanans', LayananController::class);
});

require __DIR__.'/auth.php';
