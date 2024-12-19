<?php

use App\Http\Controllers\FaktorController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['role:adminpuskesmas']], function () {

    Route::controller(FaktorController::class)->group(function(){
        Route::get('faktor', [FaktorController::class, 'index'])->name('faktor');
        Route::get('faktor/tambah', [FaktorController::class, 'create'])->name('faktor.tambah')->middleware(['role:adminpuskesmas']);
        Route::get('faktor/detail/{id}', [FaktorController::class, 'show'])->name('faktor.detail');
        Route::delete('faktor/{id}', [FaktorController::class, 'destroy'])->name('faktor.hapus')->middleware(['role:adminpuskesmas']);
        Route::post('faktor/store', [FaktorController::class, 'store'])->name('faktor.store')->middleware(['role:adminpuskesmas']);
        Route::get('faktor/{id}/ubah', [FaktorController::class, 'edit'])->name('faktor.ubah')->middleware(['role:adminpuskesmas']);
        Route::put('faktor/{id}', [FaktorController::class, 'update'])->name('faktor.update')->middleware(['role:adminpuskesmas']);
        Route::get('faktor/excel', [FaktorController::class, 'excel'])->name('faktor.excel');
        Route::get('faktor/pdf', [FaktorController::class, 'pdf'])->name('faktor.pdf');

        Route::post('faktor/csv', [FaktorController::class, 'csv'])->name('faktor.csv');

    });
});
