<?php


Route::get('announcements', 'Pub\AnnouncementsController@index')->name('announcements.index');
Route::post('announcements/store', 'Pub\AnnouncementsController@store')->name('announcements.store');
Route::get('announcements/{announcement}/show', 'Pub\AnnouncementsController@show')->name('announcements.show');
Route::patch('announcements/{announcement}/update', 'Pub\AnnouncementsController@update')->name('announcements.update');
