<?php

use App\Http\Controllers\NovelController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Redirect;
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

// - Merupakan route yang akan pertama kali diakses
Route::get('/', function () {
    //  Memberikan nilai return dimana setelah route ini diakses, ia akan langsung meneruskannya menuju route login
    return Redirect::route('login');
});

// - Merupakan route pertama yang akan diakses setelah berhasil login
Route::get('/dashboard', function () {
    //  Menampilkan halaman view bernama dashboard
    return view('dashboard');
    //  Menentukan syarat dimana user harus terauthentikasi atau terverifikasi untuk dapat login
    //  Selain itu route ini juga diberi nama route dashboard guna mempermudah pemangggilan
})->middleware(['auth', 'verified'])->name('dashboard');

// - Merupakan route group yang memiliki syarat user harus sudah terauthentikasi
Route::middleware('auth')->group(function () {
    //  Route untuk mengakses edit profile dengan nama route profile.edit
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    //  Route untuk melakukan update data profile dan diberi nama route profile.update
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    //  Route untuk menghapus data profile dan diberi nama route profile.destroy
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //  Route untuk melakukan CRUD pada data Novel
    Route::resource('novel', NovelController::class);
});

require __DIR__.'/auth.php';
