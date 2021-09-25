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

    // Subscription
    Route::apiResource('subscriptions', 'SubscriptionApiController');

    // Subscriptiondriver
    Route::apiResource('subscriptiondrivers', 'SubscriptiondriverApiController');
});


Route::group([ 'middleware' => ['jwt.verify']], function() {
    Route::post('cars/media', 'Api\V1\Admin\CarsApiController@storeMedia')->name('cars.storeMedia');
    Route::post('driver/confirm', 'AuthController@confirm');
    Route::post('client/travel', 'TravelController@store');
    Route::put('client/travel/{ID}', 'TravelController@update');
    Route::get('traveles/history', 'DriverController@history');
    Route::get('user/driver/{ID}', 'UserController@getUserDriver');
    Route::get('user/client/{ID}', 'UserController@getUserClient');
    Route::post('car/register', 'DriverController@registerCar');
});


Route::post('driver/register', 'AuthController@RegisterDriver');
Route::post('driver/login', 'AuthController@LoginDriver');

Route::post('client/login', 'AuthController@LoginClient');


Route::get('subscriptions', 'DriverController@getSub');



