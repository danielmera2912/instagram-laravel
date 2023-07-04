<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ImageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::resource("users", \App\Http\Controllers\UserController::class)->middleware("auth");
Route::resource("comments", \App\Http\Controllers\CommentController::class)->middleware("auth");
Route::resource("images", ImageController::class)->middleware("auth");
Route::get('imagen_detallada', [ImageController::class, 'imagen_detallada'])->name('imagen_detallada');
Route::get('/', function () {
    return view('auth/login');
});
Route::get('/newpost', function () {
    return view('components.newpost');
})->middleware(['auth', 'verified'])->name('newpost');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/inicio ', function () {
    return view('images.index');
})->middleware(['auth', 'verified'])->name('inicio');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
