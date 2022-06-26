<?php

Route::get('articles', 'Pub\ArticlesController@index')->name('articles.index');
Route::post('articles/store', 'Pub\ArticlesController@store')->name('articles.store');
Route::get('articles/{article}/show', 'Pub\ArticlesController@show')->name('articles.show');
Route::patch('articles/{article}/update', 'Pub\ArticlesController@update')->name('articles.update');
