<?php

namespace App\Http\Controllers;

use App\Classifications;
use App\Consequences;
use App\Details;
use App\Notifications;
use App\EventDatas;
use App\PatientDatas;
use App\Places;
use App\EventsNames;
use Illuminate\Http\Request;

class GestionController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index()

    {
        $title = 'Gestion de Incidentes';
        return view('gestion.index',compact('title'));
    }
    public function notifications()
    {
        $notifications = Notifications::all();
        $eventDatas = EventDatas::all();
        $patientDatas = PatientDatas::all();
        $places = Places::all();
        $names = EventsNames::all();
        return view('gestion.notifications',compact('notifications','eventDatas','patientDatas','places','names'));
    }
    public function manage()
    {
        return view('gestion.manage');
    }
    public function improvementPlans()
    {
        return view('gestion.improvementPlans');
    }

    public function showNotification(Notifications $notification)
    {
        $eventDatas=EventDatas::findById($notification->event_datas_id);
        $patientDatas=PatientDatas::findById($notification->patient_datas_id);
        $consequence=Consequences::findById($patientDatas->consequence_id);
        $place=Places::findById($patientDatas->place_id);
        $classification=Classifications::findById($eventDatas->classification_id);
        $eventName=EventsNames::findById($eventDatas->event_name_id);
        $detail=Details::findById($eventDatas->details_id);
        $placeEvent=Places::findById($eventDatas->place_id);

        return view('gestion.showNotification', compact('notification','detail','placeEvent','eventDatas','patientDatas','consequence','place','classification','eventName'));
    }
    public function clasification(Notifications $notification){
        return view('gestion.clasification',compact('notification'));
    }


}
