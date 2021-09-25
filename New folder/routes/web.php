<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Cars
    Route::delete('cars/destroy', 'CarsController@massDestroy')->name('cars.massDestroy');
    Route::post('cars/media', 'CarsController@storeMedia')->name('cars.storeMedia');
    Route::post('cars/ckmedia', 'CarsController@storeCKEditorImages')->name('cars.storeCKEditorImages');
    Route::post('cars/parse-csv-import', 'CarsController@parseCsvImport')->name('cars.parseCsvImport');
    Route::post('cars/process-csv-import', 'CarsController@processCsvImport')->name('cars.processCsvImport');
    Route::resource('cars', 'CarsController');

    // Drivers
    Route::delete('drivers/destroy', 'DriversController@massDestroy')->name('drivers.massDestroy');
    Route::post('drivers/parse-csv-import', 'DriversController@parseCsvImport')->name('drivers.parseCsvImport');
    Route::post('drivers/process-csv-import', 'DriversController@processCsvImport')->name('drivers.processCsvImport');
    Route::resource('drivers', 'DriversController');

    // Client
    Route::delete('clients/destroy', 'ClientController@massDestroy')->name('clients.massDestroy');
    Route::post('clients/parse-csv-import', 'ClientController@parseCsvImport')->name('clients.parseCsvImport');
    Route::post('clients/process-csv-import', 'ClientController@processCsvImport')->name('clients.processCsvImport');
    Route::resource('clients', 'ClientController');

    // Travels
    Route::delete('travel/destroy', 'TravelsController@massDestroy')->name('travel.massDestroy');
    Route::post('travel/parse-csv-import', 'TravelsController@parseCsvImport')->name('travel.parseCsvImport');
    Route::post('travel/process-csv-import', 'TravelsController@processCsvImport')->name('travel.processCsvImport');
    Route::resource('travel', 'TravelsController');

    // Rate
    Route::delete('rates/destroy', 'RateController@massDestroy')->name('rates.massDestroy');
    Route::post('rates/parse-csv-import', 'RateController@parseCsvImport')->name('rates.parseCsvImport');
    Route::post('rates/process-csv-import', 'RateController@processCsvImport')->name('rates.processCsvImport');
    Route::resource('rates', 'RateController');

    // Settings
    Route::delete('settings/destroy', 'SettingsController@massDestroy')->name('settings.massDestroy');
    Route::post('settings/parse-csv-import', 'SettingsController@parseCsvImport')->name('settings.parseCsvImport');
    Route::post('settings/process-csv-import', 'SettingsController@processCsvImport')->name('settings.processCsvImport');
    Route::resource('settings', 'SettingsController');

    // Complaints
    Route::delete('complaints/destroy', 'ComplaintsController@massDestroy')->name('complaints.massDestroy');
    Route::post('complaints/parse-csv-import', 'ComplaintsController@parseCsvImport')->name('complaints.parseCsvImport');
    Route::post('complaints/process-csv-import', 'ComplaintsController@processCsvImport')->name('complaints.processCsvImport');
    Route::resource('complaints', 'ComplaintsController');

    // Subscription
    Route::delete('subscriptions/destroy', 'SubscriptionController@massDestroy')->name('subscriptions.massDestroy');
    Route::post('subscriptions/parse-csv-import', 'SubscriptionController@parseCsvImport')->name('subscriptions.parseCsvImport');
    Route::post('subscriptions/process-csv-import', 'SubscriptionController@processCsvImport')->name('subscriptions.processCsvImport');
    Route::resource('subscriptions', 'SubscriptionController');

    // Subscriptiondriver
    Route::delete('subscriptiondrivers/destroy', 'SubscriptiondriverController@massDestroy')->name('subscriptiondrivers.massDestroy');
    Route::post('subscriptiondrivers/parse-csv-import', 'SubscriptiondriverController@parseCsvImport')->name('subscriptiondrivers.parseCsvImport');
    Route::post('subscriptiondrivers/process-csv-import', 'SubscriptiondriverController@processCsvImport')->name('subscriptiondrivers.processCsvImport');
    Route::resource('subscriptiondrivers', 'SubscriptiondriverController');

    // Confimation
    Route::delete('confimations/destroy', 'ConfimationController@massDestroy')->name('confimations.massDestroy');
    Route::post('confimations/parse-csv-import', 'ConfimationController@parseCsvImport')->name('confimations.parseCsvImport');
    Route::post('confimations/process-csv-import', 'ConfimationController@processCsvImport')->name('confimations.processCsvImport');
    Route::resource('confimations', 'ConfimationController');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
