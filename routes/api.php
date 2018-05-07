<?php



Route::get('classification/{id}/nameEvents','\App\Http\Controllers\NotificationController@getEventsForClassification');

Route::get('nameEvents/{id}/details','\App\Http\Controllers\NotificationController@getDetailsForNameEvent');


