<?php

use Illuminate\Support\Facades\Route;

use App\Models\Article;

use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\Admin\RequestsController;
use App\Http\Controllers\Admin\PluginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Route::get('/', function () {
//     $articles = Article::latest()->take(3)->get();

//     return view('pages.home', compact('articles'));
// })->name('home');

// Route::get('/kosten-mediator', function () {
//     return view('pages.kosten');
// })->name('kosten');

// Route::get('/scheiding-mediator', function () {
//     return view('pages.scheiding');
// })->name('scheiding');

// Route::get('/contact', function () {
//     return view('pages.contact');
// })->name('contact');

// Route::get('/privacybeleid', function () {
//     return view('pages.privacybeleid');
// })->name('privacybeleid');

// Route::get('/algemene-voorwaarden', function () {
//     return view('pages.av');
// })->name('av');

// Route::get('/deelnemen-als-bedrijf', function () {
//     return view('pages.deelnemen-als-bedrijf');
// })->name('deelnemen');

// Route::get('/bevestig-je-aanvraag', function () {
//     return view('pages.bevestig-je-aanvraag');
// })->name('bevestig');

// Route::get('/aanvraag-verzonden', function () {
//     return view('pages.aanvraag-verzonden');
// })->name('verzonden');

// Route::get('/bevestig-je-aanmelding', function () {
//     return view('pages.bevestig-je-aanmelding');
// })->name('bevestig_aanmelding');

// Route::get('/aanmelding-voltooid', function () {
//     return view('pages.aanmelding-voltooid');
// })->name('aanmelding_voltooid');

// Route::get('/blog', [ArticlesController::class, 'articles'] )->name('blog');
// Route::get('/blog/{slug}', [ArticlesController::class, 'article'] )->name('article');

//Route::get('verwerk-facturen', [EboekhoudenController::class, 'processInvoices']);

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

//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
