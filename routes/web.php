<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function(){
    // Route::get('/sample-chart', [SubmissionChartController::class, 'index']);
    // Route::get('/sc', [CountSubmissionController::class, 'index']);
    // // Route::get('/profile',[ProfileController::class,'index'])->name('profile');

});
// Home Page Route (define this FIRST to prioritize it)
Route::get('/', [HomeController::class, 'index'])->name('home');