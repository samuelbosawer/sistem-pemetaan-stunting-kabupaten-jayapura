<?php

use App\Http\Controllers\ClusteringController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['role:admindinas|adminpuskesmas|kepaladinas']], function () {

    Route::controller(ClusteringController::class)->group(function(){
        Route::get('clustering', [ClusteringController::class, 'index'])->name('clustering');
    });
});
