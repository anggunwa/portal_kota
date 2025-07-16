<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use App\Models\OPD;
use App\Http\Controllers\Admin\OPDController;
use App\Http\Controllers\Admin\LayananController;
use App\Http\Controllers\LayananDetailController;

Route::get('/', function () {
    $query = request('q');
    
    $opds = \App\Models\OPD::when($query, function ($queryBuilder) use ($query) {
        $queryBuilder->where('nama', 'like', '%' . $query . '%')
                     ->orWhereHas('layanans', function ($q) use ($query) {
                         $q->where('nama_layanan', 'like', '%' . $query . '%');
                     });
    })->get();

    return view('frontend.index', compact('opds'));
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

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
