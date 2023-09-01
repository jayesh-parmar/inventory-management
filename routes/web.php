<?php

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\ProfileController;
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

Route::get('/dashboard', static fn() => view('dashboard'))->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(static function () : void {
    Route::get('/profile', static fn(Request $request): View => (new ProfileController())->edit($request))->name('profile.edit');
    Route::patch('/profile', static fn(ProfileUpdateRequest $profileUpdateRequest): RedirectResponse => (new ProfileController())->update($profileUpdateRequest))->name('profile.update');
    Route::delete('/profile', static fn(Request $request): RedirectResponse => (new ProfileController())->destroy($request))->name('profile.destroy');
});

require __DIR__.'/auth.php';
