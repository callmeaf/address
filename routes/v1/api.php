<?php

use \Illuminate\Support\Facades\Route;

Route::prefix(config('callmeaf-base.api.prefix_url'))->as(config('callmeaf-base.api.prefix_route_name'))->middleware(config('callmeaf-base.api.middlewares'))->group(function() {
    Route::apiResource('addresses',config('callmeaf-address.controllers.addresses'));
    Route::prefix('addresses')->as('addresses.')->controller(config('callmeaf-address.controllers.addresses'))->group(function() {
        Route::prefix('{address}')->group(function() {
            Route::patch('/status','statusUpdate')->name('status_update');
        });
    });
});
