<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['role:admindinas']], function () {

    Route::controller(UserController::class)->group(function(){
        Route::get('user', [UserController::class, 'index'])->name('user');
        Route::get('user/tambah', [UserController::class, 'create'])->name('user.tambah')->middleware(['role:admindinas']);
        Route::get('user/detail/{id}', [UserController::class, 'show'])->name('user.detail');
        Route::delete('user/{id}', [UserController::class, 'destroy'])->name('user.hapus')->middleware(['role:admindinas']);
        Route::post('user/store', [UserController::class, 'store'])->name('user.store')->middleware(['role:admindinas']);
        Route::get('user/{id}/ubah', [UserController::class, 'edit'])->name('user.ubah')->middleware(['role:admindinas']);
        Route::put('user/{id}', [UserController::class, 'update'])->name('user.update')->middleware(['role:admindinas']);
        Route::get('user/excel', [UserController::class, 'excel'])->name('user.excel');
        Route::get('user/pdf', [UserController::class, 'pdf'])->name('user.pdf');
    });
});
