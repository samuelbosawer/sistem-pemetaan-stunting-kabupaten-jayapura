<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;

// Route::get('/', function () {
//     return redirect()->route('login');
// });

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/peta/kelurahan/{id}', [HomeController::class, 'peta'])->name('home.peta.kelurahan');


Auth::routes();



require_once 'admin.php';
