<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::get('/notificacion', 'NotificationController@index')
    ->name('notifications.index');

Route::post('/notificacion', 'NotificationController@storeEventData');

Route::get('/notificacion/paciente', 'NotificationController@create')
    ->name('notifications.patient');

Route::get('/notificacion/evento', 'NotificationController@event')
    ->name('notifications.event');

Route::post('notificacion/evento', 'NotificationController@storePatientData');

Route::get('/gestion','GestionController@index')
    ->name('gestion.index');

Route::get('/gestion/notificaciones','GestionController@notifications')
    ->name('gestion.notifications');

Route::get('/gestion/administrarUsuarios','GestionController@manage')
    ->name('gestion.manage');

Route::get('/gestion/PlanesDeMejora','GestionController@improvementPlans')
    ->name('gestion.improvementPlans');
Route::get('/gestion/notificaciones/{notification}/detalles', 'GestionController@showNotification')
    ->where('notification', '[0-9]+')
    ->name('gestion.showNotification');
Route::get('/gestion/notificaciones/{notification}/clasificacion', 'GestionController@clasification')
    ->where('notification', '[0-9]+')
    ->name('gestion.clasification');


Auth::routes();

