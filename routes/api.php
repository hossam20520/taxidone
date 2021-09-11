<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Cars
    Route::post('cars/media', 'CarsApiController@storeMedia')->name('cars.storeMedia');
    Route::apiResource('cars', 'CarsApiController');

    // Drivers
    Route::apiResource('drivers', 'DriversApiController');

    // Client
    Route::apiResource('clients', 'ClientApiController');

    // Travels
    Route::apiResource('travel', 'TravelsApiController');

    // Rate
    Route::apiResource('rates', 'RateApiController');

    // Settings
    Route::apiResource('settings', 'SettingsApiController');

    // Complaints
    Route::apiResource('complaints', 'ComplaintsApiController');
});
