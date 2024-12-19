<?php

use App\Http\Controllers\StuntingController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['role:admindinas']], function () {

    Route::controller(StuntingController::class)->group(function(){
        Route::get('stunting', [StuntingController::class, 'index'])->name('stunting');
        Route::get('stunting/tambah', [StuntingController::class, 'create'])->name('stunting.tambah')->middleware(['role:admindinas']);
        Route::get('stunting/detail/{id}', [StuntingController::class, 'show'])->name('stunting.detail');
        Route::delete('stunting/{id}', [StuntingController::class, 'destroy'])->name('stunting.hapus')->middleware(['role:admindinas']);
        Route::post('stunting/store', [StuntingController::class, 'store'])->name('stunting.store')->middleware(['role:admindinas']);
        Route::get('stunting/{id}/ubah', [StuntingController::class, 'edit'])->name('stunting.ubah')->middleware(['role:admindinas']);
        Route::put('stunting/{id}', [StuntingController::class, 'update'])->name('stunting.update')->middleware(['role:admindinas']);
        Route::get('stunting/excel', [StuntingController::class, 'excel'])->name('stunting.excel');
        Route::get('stunting/pdf', [StuntingController::class, 'pdf'])->name('stunting.pdf');

        Route::post('stunting/csv', [StuntingController::class, 'csv'])->name('stunting.csv');

    });
});
