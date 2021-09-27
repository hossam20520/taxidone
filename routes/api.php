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
    Route::post('client/travel', 'TravelController@store');
    Route::put('client/travel/{ID}', 'TravelController@update');
    Route::get('user/client/{ID}', 'UserController@getUserClient');
    Route::post('client/confirm', 'AuthController@confirmClient');
    Route::post('client/travel/pay', 'PaymentController@payment');
    Route::post('feedback/travel', 'TravelController@feedback');
});


Route::group([ 'middleware' => ['jwt.verify']], function() {
    Route::post('cars/media', 'Api\V1\Admin\CarsApiController@storeMedia')->name('cars.storeMedia');
    Route::post('driver/confirm', 'AuthController@confirm');
    Route::get('traveles/history', 'DriverController@history');
    Route::get('user/driver/{ID}', 'UserController@getUserDriver');
    Route::post('car/register', 'DriverController@registerCar');

    Route::post('driver/subscrip/pay', 'DriverController@subscrip');
 
    Route::get('subscription/check', 'DriverController@check');

    Route::post('feedback/rate', 'TravelController@rate');

});


Route::group(['middleware' => ['role.driver']], function () { 

    Route::post('driver/login', 'AuthController@LoginDriver');

});


Route::group(['middleware' => ['role.client']], function () { 



    Route::post('client/login', 'AuthController@LoginClient');

});



Route::post('driver/register', 'AuthController@RegisterDriver');
Route::post('client/register', 'AuthController@RegisterClient');





Route::get('subscriptions', 'DriverController@getSub');



