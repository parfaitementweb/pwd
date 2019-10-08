<?php

Route::get('/', 'HomeController@index');
Route::get('show/{uuid}', 'HomeController@show')->name('show');
Route::get('show/{uuid}/reveal', 'HomeController@reveal')->name('reveal');
Route::get('create', 'HomeController@create')->name('create');
Route::post('update', 'HomeController@update')->name('update');
Route::get('created/{uuid}', 'HomeController@created')->name('created');
