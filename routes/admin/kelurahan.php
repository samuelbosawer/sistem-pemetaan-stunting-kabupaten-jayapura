<?php

use App\Http\Controllers\KelurahanController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['role:admindinas']], function () {

    Route::controller(KelurahanController::class)->group(function(){
        Route::get('kelurahan', [KelurahanController::class, 'index'])->name('kelurahan');
        Route::get('kelurahan/tambah', [KelurahanController::class, 'create'])->name('kelurahan.tambah')->middleware(['role:admin']);
        Route::get('kelurahan/detail/{id}', [KelurahanController::class, 'show'])->name('kelurahan.detail');
        Route::delete('kelurahan/{id}', [KelurahanController::class, 'destroy'])->name('kelurahan.hapus')->middleware(['role:admin']);
        Route::post('kelurahan/store', [KelurahanController::class, 'store'])->name('kelurahan.store')->middleware(['role:admin']);
        Route::get('kelurahan/{id}/ubah', [KelurahanController::class, 'edit'])->name('kelurahan.ubah')->middleware(['role:admin|kelurahan']);
        Route::put('kelurahan/{id}', [KelurahanController::class, 'update'])->name('kelurahan.update')->middleware(['role:admin|kelurahan']);
        Route::get('kelurahan/excel', [KelurahanController::class, 'excel'])->name('kelurahan.excel');
        Route::get('kelurahan/pdf', [KelurahanController::class, 'pdf'])->name('kelurahan.pdf');
    });
});
