<?php

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(static function () : void {
    Route::get('register', static fn(): View => (new RegisteredUserController())->create())
                ->name('register');
    Route::post('register', static fn(Request $request): RedirectResponse => (new RegisteredUserController())->store($request));
    Route::get('login', static fn(): View => (new AuthenticatedSessionController())->create())
                ->name('login');
    Route::post('login', static fn(LoginRequest $loginRequest): RedirectResponse => (new AuthenticatedSessionController())->store($loginRequest));
    Route::get('forgot-password', static fn(): View => (new PasswordResetLinkController())->create())
                ->name('password.request');
    Route::post('forgot-password', static fn(Request $request): RedirectResponse => (new PasswordResetLinkController())->store($request))
                ->name('password.email');
    Route::get('reset-password/{token}', static fn(Request $request): View => (new NewPasswordController())->create($request))
                ->name('password.reset');
    Route::post('reset-password', static fn(Request $request): RedirectResponse => (new NewPasswordController())->store($request))
                ->name('password.store');
});

Route::middleware('auth')->group(static function () : void {
    Route::get('verify-email', EmailVerificationPromptController::class)
                ->name('verification.notice');
    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify');
    Route::post('email/verification-notification', static fn(Request $request): RedirectResponse => (new EmailVerificationNotificationController())->store($request))
                ->middleware('throttle:6,1')
                ->name('verification.send');
    Route::get('confirm-password', static fn(): View => (new ConfirmablePasswordController())->show())
                ->name('password.confirm');
    Route::post('confirm-password', static fn(Request $request): RedirectResponse => (new ConfirmablePasswordController())->store($request));
    Route::put('password', static fn(Request $request): RedirectResponse => (new PasswordController())->update($request))->name('password.update');
    Route::post('logout', static fn(Request $request): RedirectResponse => (new AuthenticatedSessionController())->destroy($request))
                ->name('logout');
});
