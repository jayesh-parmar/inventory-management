<?php
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\BrandController;
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


Route::get('/', static fn() => view('auth.login'));
Route::get('/', function () {
    return view('auth.login');
});


Route::get('/dashboard', static fn() => view('dashboard'))->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(static function () : void {
    Route::get('/profile', static fn(Request $request): View => (new ProfileController())->edit($request))->name('profile.edit');
    Route::patch('/profile', static fn(ProfileUpdateRequest $profileUpdateRequest): RedirectResponse => (new ProfileController())->update($profileUpdateRequest))->name('profile.update');
    Route::delete('/profile', static fn(Request $request): RedirectResponse => (new ProfileController())->destroy($request))->name('profile.destroy');
});
Route::controller(BrandController::class)->middleware('auth')->name('brand.')->group(function () {
    Route::get('brands', 'index')->name('index');
    Route::get('brands/create', 'addBrand')->name('create');
    Route::post('brands', 'store')->name('store');
    Route::get('brands/{brandId}/edit', 'edit')->name('edit');
    Route::post('brands/{brandId}/update', 'update')->name('update');
});

Route::controller(SizeController::class)->middleware('auth')->name('size.')->group(function () {
    Route::get('sizes', 'index')->name('index');
    Route::get('sizes/create', 'add')->name('create');
    Route::post('sizes', 'store')->name('store');
    Route::get('sizes/{sizeId}/edit', 'edit')->name('edit');
    Route::post('sizes/{sizeId}/update', 'update')->name('update');
});

Route::controller(ColorController::class)->middleware('auth')->name('color.')->group(function () {
    Route::get('colors', 'index')->name('index');
    Route::get('colors/create','addColor')->name('create');
    Route::post('colors', 'store')->name('store');
    Route::get('colors/{colorId}/edit', 'edit')->name('edit');
    Route::post('colors/{colorId}/update', 'update')->name('update');
});

require __DIR__ . '/auth.php';
