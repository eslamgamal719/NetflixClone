<?php


Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.', 'middleware' => ['auth', 'role:super_admin|admin']], function () {


    //welcome Route
    Route::get('/', 'WelcomeController@index')->name('welcome');


    //Category Routes
    Route::resource('categories', 'CategoryController')->except('show');


    //Movie Routes
    Route::resource('movies', 'MovieController');


    //Roles Routes
    Route::resource('roles', 'RoleController')->except('show');


    //User Controller
    Route::resource('users', 'UserController')->except('show');


    // socialite Routes
    Route::get('/settings/social_login', 'SettingController@social_login')->name('settings.social_login');
    Route::get('/settings/social_links', 'SettingController@social_links')->name('settings.social_links');

    Route::post('/settings', 'SettingController@store')->name('settings.store');
});
