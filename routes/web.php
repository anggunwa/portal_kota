<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\OPDController;
use App\Models\OPD;

Route::get('/', function () {
    $opds = OPD::orderBy('nama')->get();
    return view('welcome', compact('opds'));
});

Route::prefix('admin')->group(function (){
    Route::resource('opds', OPDController::class)->names('admin.opds');
});