<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\MahasiswaController;
use App\Http\Controllers\Admin\JurusanController;
use App\Http\Controllers\DashboardController;

Route::group(['middleware' => ['auth']], function () {
    Route::prefix('admin')->name('admin.')->group(function () {

        // Dashboard
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('dashboard/peta/kelurahan/{id}', [DashboardController::class, 'peta'])->name('peta.kelurahan');

            require_once 'admin/kelurahan.php';
            require_once 'admin/distrik.php';
            require_once 'admin/puskesmas.php';
            require_once 'admin/stunting.php';
            require_once 'admin/perhitungan.php';
            require_once 'admin/faktor.php';
            require_once 'admin/user.php';


    });
});
