<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\RequestsController;
use App\Http\Controllers\Admin\PluginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Admin routes

// Publieke admin routes
Route::get('inloggen', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('inloggen', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::get('wachtwoord/herstellen', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('wachtwoord/email', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('wachtwoord/herstellen/{token}', [App\Http\Controllers\Auth\ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('wachtwoord/herstellen', [App\Http\Controllers\Auth\ResetPasswordController::class, 'reset'])->name('password.update');

// Beveiligde admin routes
Route::middleware(['auth'])->group(function () {
    Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::get('registreren', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('registreren', [App\Http\Controllers\Auth\RegisterController::class, 'register']);
    Route::post('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

    Route::get('instellingen', [App\Http\Controllers\Admin\SettingsController::class, 'index'])->name('settings.index');
    Route::put('instellingen', [App\Http\Controllers\Admin\SettingsController::class, 'update'])->name('settings.update');

    Route::post('plugins/install/{name}', [App\Http\Controllers\Admin\SettingsController::class, 'installPlugin'])->name('plugins.install');
    Route::post('plugins/uninstall/{name}', [App\Http\Controllers\Admin\SettingsController::class, 'uninstallPlugin'])->name('plugins.uninstall');
});