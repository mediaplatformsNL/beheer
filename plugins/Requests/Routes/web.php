<?php

use Illuminate\Support\Facades\Route;
use Plugins\Requests\Controllers\RequestsController;

Route::group([
    'prefix' => 'aanvragen',
    'middleware' => ['web', 'auth'] // Voeg hier middleware toe die je voor de backend gebruikt
], function () {
    Route::get('/', [RequestsController::class, 'index'])->name('requests.index');
    Route::get('/nieuw', [RequestsController::class, 'create'])->name('requests.create');
    Route::get('/uitleg', [RequestsController::class, 'manual'])->name('requests.manual');
});
