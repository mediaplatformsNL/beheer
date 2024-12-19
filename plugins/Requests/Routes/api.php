<?php

use Illuminate\Support\Facades\Route;
use Plugins\Requests\Controllers\RequestsController;

Route::group(['middleware' => 'api'], function () {
    Route::post('aanvragen/opslaan/{api_key}', [RequestsController::class, 'store'])
        ->name('api.requests.store')
        ->middleware('validate.api_key_and_domain');
});