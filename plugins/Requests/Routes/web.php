<?php

use Illuminate\Support\Facades\Route;
use Plugins\Requests\Controllers\RequestsController;

Route::group([
    'prefix' => 'aanvragen',
    'middleware' => ['web', 'auth']
], function () {
    Route::get('/', [RequestsController::class, 'index'])->name('requests.index');
    Route::get('/nieuw', [RequestsController::class, 'create'])->name('requests.create');
    Route::get('/uitleg', [RequestsController::class, 'manual'])->name('requests.manual');
    Route::get('/{requestModel}/bewerken', [RequestsController::class, 'edit'])->name('requests.edit');
    Route::put('/{requestModel}', [RequestsController::class, 'update'])->name('requests.update');
});
