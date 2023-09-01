<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::controller(UserController::class)->name('brand.')->group(function () {
    Route::get('brands', 'index')->name('brands');
    Route::get('brands-add', 'addBrand')->name('add');
    Route::post('brand-create', 'store')->name('store');
    Route::get('edit-brand/{brandId}', 'edit')->name('edit');
    Route::post('update-brand/{brandId}', 'update')->name('update'); 
})->middleware(['auth', 'verified'])->name('dashboard');