<?php

use App\Http\Controllers\CountSubmissionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SubmissionChartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Models\Role;

Route::middleware(['auth'])->group(function(){
    // Route::get('/sample-chart', [SubmissionChartController::class, 'index']);
    // Route::get('/sc', [CountSubmissionController::class, 'index']);
    // // Route::get('/profile',[ProfileController::class,'index'])->name('profile');

});





