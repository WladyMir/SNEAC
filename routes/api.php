<?php


Route::get('origin/{id}/contributoryFactor','\App\Http\Controllers\NotificationController@getFactorForOrigin');

Route::get('classification/{id}/nameEvents','\App\Http\Controllers\NotificationController@getEventsForClassification');

Route::get('nameEvents/{id}/details','\App\Http\Controllers\NotificationController@getDetailsForNameEvent');

Route::get('report/{id}/participants','\App\Http\Controllers\ApiController@getParticipantsForReport');

Route::get('report/{id}/dates','\App\Http\Controllers\ApiController@getDatesForReport');

Route::get('report/{id}/contributoryFactors','\App\Http\Controllers\ApiController@getContributoryFactorsForReport');

Route::get('/improvementPlan/{id}/activities','\App\Http\Controllers\ApiController@getActivitiesForImprovementPlan');

Route::get('/improvementPlan/activity/{id}/responsable','\App\Http\Controllers\ApiController@getResponsableForActivity');

Route::get('/improvementPlan/activity/{id}/responsableMonitoring','\App\Http\Controllers\ApiController@getResponsableMonitoringForActivity');

Route::get('/notification/place/{id}','\App\Http\Controllers\ApiController@getNotificationsForPlace');

Route::get('/notification/eventType/{event_type}','\App\Http\Controllers\ApiController@getNotificationsForEventType');

Route::get('/notification/eventStatus/{event_status}','\App\Http\Controllers\ApiController@getNotificationsForStatus');

Route::get('/places','\App\Http\Controllers\ApiController@getPlaces');




