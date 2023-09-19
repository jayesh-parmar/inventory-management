<?php
use App\Http\Controllers\ColorController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SizeController;
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
Route::controller(BrandController::class)->middleware('auth')->name('brand.')->group(function () {
    Route::get('brands', 'index')->name('index');
    Route::get('brands/create', 'addBrand')->name('create');
    Route::post('brands', 'store')->name('store');
    Route::get('brands/{brandId}/edit', 'edit')->name('edit');
    Route::post('brands/{brand}/update', 'update')->name('update');
});

Route::controller(SizeController::class)->middleware('auth')->name('size.')->group(function () {
    Route::get('sizes', 'index')->name('index');
    Route::get('sizes/create', 'add')->name('create');
    Route::post('sizes', 'store')->name('store');
    Route::get('sizes/{sizeId}/edit', 'edit')->name('edit');
    Route::post('sizes/{size}/update', 'update')->name('update');
});

Route::controller(ColorController::class)->middleware('auth')->name('color.')->group(function () {
    Route::get('colors', 'index')->name('index');
    Route::get('colors/create','addColor')->name('create');
    Route::post('colors', 'store')->name('store');
    Route::get('colors/{colorId}/edit', 'edit')->name('edit');
    Route::post('colors/{color}/update', 'update')->name('update');
});

Route::controller(CategoryController::class)->middleware('auth')->name('categories.')->group(function () {
    Route::get('categories', 'index')->name('index');
    Route::get('categories/create', 'add')->name('create');
    Route::post('categories', 'store')->name('store');
});

require __DIR__ . '/auth.php';
