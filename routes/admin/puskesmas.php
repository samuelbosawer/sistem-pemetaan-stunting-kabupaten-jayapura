<?php

use App\Http\Controllers\PuskesmasController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['role:admindinas']], function () {

    Route::controller(PuskesmasController::class)->group(function(){
        Route::get('puskesmas', [PuskesmasController::class, 'index'])->name('puskesmas');
        Route::get('puskesmas/tambah', [PuskesmasController::class, 'create'])->name('puskesmas.tambah')->middleware(['role:admin']);
        Route::get('puskesmas/detail/{id}', [PuskesmasController::class, 'show'])->name('puskesmas.detail');
        Route::delete('puskesmas/{id}', [PuskesmasController::class, 'destroy'])->name('puskesmas.hapus')->middleware(['role:admin']);
        Route::post('puskesmas/store', [PuskesmasController::class, 'store'])->name('puskesmas.store')->middleware(['role:admin']);
        Route::get('puskesmas/{id}/ubah', [PuskesmasController::class, 'edit'])->name('puskesmas.ubah')->middleware(['role:admin|puskesmas']);
        Route::put('puskesmas/{id}', [PuskesmasController::class, 'update'])->name('puskesmas.update')->middleware(['role:admin|puskesmas']);
        Route::get('puskesmas/excel', [PuskesmasController::class, 'excel'])->name('puskesmas.excel');
        Route::get('puskesmas/pdf', [PuskesmasController::class, 'pdf'])->name('puskesmas.pdf');
    });
});
