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
Route::get('/home', function () {
    return view('home');
});



Route::get('/notificacion', 'NotificationController@index')
    ->name('notifications.index');




Route::get('/notificacion/nueva', 'NotificationController@newNotification')
    ->name('notifications.newNotification');



Route::post('notificacion/nueva', 'NotificationController@storeNotification');



Route::get('/gestion','GestionController@index')
    ->name('gestion.index');


Auth::routes();

Route::group(['middleware' => 'auth'],function (){

    Route::get('descargarinforme/{report}', 'ReportController@createPdf')
        ->where('report', '[0-9]+')
        ->name('reports.pdf');

    Route::post('/gestion/informes/agregarParticipante', 'ReportController@addParticipant')
        ->name('reports.addParticipant');

    Route::post('/gestion/informes/agregarFecha', 'ReportController@addDate')
        ->name('reports.addDate');

    Route::post('/gestion/informes/agregarFactorContributivo', 'ReportController@addContributoryFactor')
        ->name('reports.addContributoryFactor');

    Route::get('/gestion/informes/{report}/detalles', 'ReportController@showReport')
        ->where('report', '[0-9]+')
        ->name('reports.showReport');

    Route::get('/gestion/informes/{report}/crearInforme', 'ReportController@makeReport')
        ->where('report', '[0-9]+')
        ->name('reports.makeReport');

    Route::put('/gestion/informe/{report}/actualizar','ReportController@updateReport');

    Route::put('/gestion/informe/{report}/actualizarEstado','ReportController@updateStatusReport');

    Route::get('/gestion/informes','ReportController@reports')
        ->name('reports.reports');

    Route::delete('/participant/{participant}', 'ReportController@destroyParticipant')
        ->name('reports.destroyParticipant');

    Route::delete('/reportDate/{id}', 'ReportController@destroyDate')
        ->name('reports.destroyDate');

    Route::delete('/contributoryFactor/{id}', 'ReportController@destroyContributoryFactor')
        ->name('reports.destroyContributoryFactor');

    Route::get('descargarPlanDeMejora/{improvementPlan}', 'ImprovementPlanController@createPdf')
        ->where('report', '[0-9]+')
        ->name('$improvementPlans.pdf');

    Route::get('/gestion/PlanesDeMejora','ImprovementPlanController@improvementPlans')
        ->name('improvementPlans.improvementPlans');

    Route::get('/gestion/PlanesDeMejora/{improvementPlan}','ImprovementPlanController@makeImprovementPlan')
        ->name('improvementPlans.makeImprovementPlan');

    Route::get('/gestion/PlanesDeMejora/{improvementPlan}/agregarActividad/{activity}', 'ImprovementPlanController@addActivity2')
        ->name('improvementPlans.addActivity2');

    Route::get('/gestion/PlanesDeMejora/{improvementPlan}/addAct', 'ImprovementPlanController@addActivityAux')
        ->name('improvementPlans.addActivityAux');

    Route::put('/gestion/planMejora/{activity}/agregarActividad','ImprovementPlanController@addActivityToImprovementPlan');

    Route::put('/gestion/planMejora/{improvementPlan}/actualizar','ImprovementPlanController@updateImprovementPlan');

    Route::post('/gestion/planMejora/agregarResponsable', 'ImprovementPlanController@addResponsable')
        ->name('improvementPlans.addResponsable');

    Route::post('/gestion/planMejora/agregarResponsableMonitoreo', 'ImprovementPlanController@addResponsableMonitoring')
        ->name('improvementPlans.addResponsableMonitoring');

    Route::delete('/responsable/{responsable}', 'ImprovementPlanController@destroyResponsable')
        ->name('improvementPlans.destroyResponsable');

    Route::delete('/responsable/monitoring/{responsable}', 'ImprovementPlanController@destroyResponsableMonitoring')
        ->name('improvementPlans.destroyResponsableMonitoring');

    Route::post('/gestion/planMejora/agregarActividad', 'ImprovementPlanController@addActivity')
        ->name('improvementPlans.addActivity');

    Route::get('/gestion/planMejora/{activity}/editarActividad', 'ImprovementPlanController@activityEdit')
        ->name('improvementPlans.activityEdit');

    Route::delete('/activity/{id}', 'ImprovementPlanController@destroyActivity')
        ->name('improvementPlans.destroyActivity');

    Route::get('/gestion/PlanesDeMejoras/actividadesAsignadas','ImprovementPlanController@assignedActivities')
        ->name('improvementPlans.assignedActivities');
});

Route::group(['middleware' => 'admin'],function (){
    Route::get('/gestion/informes/todos','ReportController@allReports')
        ->name('reports.allReports');

    Route::get('/gestion/PlanesDeMejoras/todos','ImprovementPlanController@allImprovementPlans')
        ->name('improvementPlans.allImprovementPlans');

    Route::get('/gestion/PlanesDeMejoras/monitoreoActividades','ImprovementPlanController@activityMonitoring')
        ->name('improvementPlans.activityMonitoring');

    Route::put('/gestion/PlanesDeMejoras/monitoreoActividades/updateStatusActivity/{activityImprovementPlan}','ImprovementPlanController@updateStatusActivity')
        ->name('improvementPlans.updateStatusActivity');

    Route::get('/gestion/notificaciones','GestionController@notifications')
        ->name('gestion.notifications');

    Route::get('/gestion/administrarUsuarios','AdministrationController@administration')
        ->name('gestion.administration');

    Route::get('/gestion/administrarUsuarios/{user}/editar', 'AdministrationController@userEdit')->name('gestion.userEdit');

    Route::put('/gestion/administrarUsuarios/{user}', 'AdministrationController@updateUser');

    Route::delete('/usuarios/{user}', 'AdministrationController@userDestroy')->name('gestion.userDestroy');

    Route::get('/gestion/notificaciones/{notification}/detalles', 'GestionController@showNotification')
        ->where('notification', '[0-9]+')
        ->name('gestion.showNotification');

    Route::get('/gestion/notificaciones/{notification}/clasificacion', 'GestionController@clasification')
        ->where('notification', '[0-9]+')
        ->name('gestion.clasification');

    Route::get('/gestion/notificaciones/{notification}/causas', 'GestionController@causes')
        ->where('notification', '[0-9]+')
        ->name('gestion.causes');

    Route::put('/gestion/notificaciones/{notification}/causa','GestionController@causesUpdate');

    Route::put('/gestion/notificaciones/{notification}/clasificacion','GestionController@statusUpdate');

    Route::post('/gestion/notificaciones','GestionController@reportAssignment');

});






