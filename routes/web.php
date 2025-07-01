<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\OPDController;

Route::get('/', function () {
    return view('home');
});

Route::prefix('admin')->group(function (){
    Route::resource('opds', OPDController::class)->names('admin.opds');
});