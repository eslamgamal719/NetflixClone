<?php



Route::get('/', 'WelcomeController@index')->name('welcome');



Auth::routes();


//Movie Routes
Route::post('/movies/{movie}/increment_views', 'MovieController@increment_views')->name('movies.increment');
Route::post('/movies/{movie}/toggle_favorite', 'MovieController@toggle_favorite')->name('movies.toggle_favorite');
Route::resource('movies', 'MovieController')->only(['index', 'show']);



// Login with facebook and google
Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider')->where('provider', 'facebook|google');
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback')->where('provider', 'facebook|google');
