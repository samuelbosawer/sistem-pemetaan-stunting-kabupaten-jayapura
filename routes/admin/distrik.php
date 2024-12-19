<?php

use App\Http\Controllers\DistrikController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['role:admindinas']], function () {

    Route::controller(DistrikController::class)->group(function(){
        Route::get('distrik', [DistrikController::class, 'index'])->name('distrik');
        Route::get('distrik/tambah', [DistrikController::class, 'create'])->name('distrik.tambah')->middleware(['role:admindinas']);
        Route::get('distrik/detail/{id}', [DistrikController::class, 'show'])->name('distrik.detail');
        Route::delete('distrik/{id}', [DistrikController::class, 'destroy'])->name('distrik.hapus')->middleware(['role:admindinas']);
        Route::post('distrik/store', [DistrikController::class, 'store'])->name('distrik.store')->middleware(['role:admindinas']);
        Route::get('distrik/{id}/ubah', [DistrikController::class, 'edit'])->name('distrik.ubah')->middleware(['role:admindinas']);
        Route::put('distrik/{id}', [DistrikController::class, 'update'])->name('distrik.update')->middleware(['role:admindinas']);

        Route::post('distrik/csv', [DistrikController::class, 'csv'])->name('distrik.csv');

        Route::get('distrik/excel', [DistrikController::class, 'excel'])->name('distrik.excel');
        Route::get('distrik/pdf', [DistrikController::class, 'pdf'])->name('distrik.pdf');
    });
});
