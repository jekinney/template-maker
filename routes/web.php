<?php
Route::get('/', 'HomeController@index')->name('home');

Route::resource('basic', 'BasicController');
Route::resource('advanced', 'AdvancedController');
Route::resource('variable', 'VariableController');

Auth::routes();
