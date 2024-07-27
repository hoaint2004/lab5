<?php

use App\Http\Controllers\Admin\MovieController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
    Route::get('movie/list', [MovieController::class,'index'])->name('movie.index');
    Route::get('movie/create', [MovieController::class, 'create'])->name('movie.create');
    Route::post('movie/create', [MovieController::class, 'store'])->name('movie.store');
    Route::get('movie/detail/{movie}', [MovieController::class, 'detail'])->name('movie.detail');
    Route::get('movie/edit/{movie}', [MovieController::class, 'edit'])->name('movie.edit');
    Route::put('movie/edit/{movie}', [MovieController::class, 'update'])->name('movie.update');
    Route::delete('movie/delete/{movie}', [MovieController::class, 'destroy'])->name('movie.destroy');
    Route::get('movie/search', [MovieController::class, 'search'])->name('movie.search');
