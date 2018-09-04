<?php

namespace App\Http\Controllers;

use App\Classification;
use App\Consequence;
use App\ContributoryFactor;
use App\Detail;
use App\ImprovementPlan;
use App\Notification;
use App\EventData;
use App\Origin;
use App\PatientData;
use App\Place;
use App\EventsName;
use App\Report;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GestionController extends Controller
{

    public function __construct(){
        $this->middleware('admin');
    }

    public function index()
    {
        $title = 'Gestion de Incidentes';
        $id=Auth::id();
        $count= Notification::countByStatus('Por revisar');
        $quantityReports=Report::countByStatusAndUser('Entregado',$id);
        $quantityAllReports=Report::countByStatus('Entregado');
        $quantityAllImpPlans=ImprovementPlan::countByStatus(3);
        $quantityImpPlans=ImprovementPlan::countByStatusAndUser(3,$id);

        return view('gestion.index',compact('title','quantityAllImpPlans','quantityImpPlans','quantityAllReports','quantityReports','count'));
    }


    public function notifications()
    {
        $id=Auth::id();
        $notifications = Notification::all();
        $eventDatas = EventData::all();
        $patientDatas = PatientData::all();
        $places = Place::all();
        $names = EventsName::all();
        $count= Notification::countByStatus('Por revisar');
        $quantityReports=Report::countByStatusAndUser('Entregado',$id);
        $quantityAllReports=Report::countByStatus('Entregado');
        $quantityAllImpPlans=ImprovementPlan::countByStatus(3);
        $quantityImpPlans=ImprovementPlan::countByStatusAndUser(3,$id);

        return view('gestion.notifications.notifications',compact('quantityAllImpPlans','quantityImpPlans','quantityAllReports','quantityReports','count','notifications','eventDatas','patientDatas','places','names'));
    }

    public function administration()
    {
        $id=Auth::id();
        $count= Notification::countByStatus('Por revisar');
        $quantityReports=Report::countByStatusAndUser('Entregado',$id);
        $quantityAllReports=Report::countByStatus('Entregado');
        $quantityAllImpPlans=ImprovementPlan::countByStatus(3);
        $quantityImpPlans=ImprovementPlan::countByStatusAndUser(3,$id);
        return view('gestion.administration.administration',compact('quantityAllImpPlans','quantityImpPlans','quantityAllReports','quantityReports','count'));
    }

    public function improvementPlans()
    {
        $count= Notification::countByStatus('Por revisar');
        $id=Auth::id();
        $quantityReports=Report::countByStatusAndUser('Entregado',$id);
        $quantityAllReports=Report::countByStatus('Entregado');
        $quantityAllImpPlans=ImprovementPlan::countByStatus(3);
        $quantityImpPlans=ImprovementPlan::countByStatusAndUser(3,$id);
        return view('gestion.improvementPlans.improvementPlans',compact('quantityAllImpPlans','quantityImpPlans','quantityAllReports','quantityReports','count'));
    }
    public function reportAssignment(){
        $data=request()->validate([
            'user_id'=> 'required',
            'notification_id'=> 'required',
            'message' => 'required',
            ]);
        if(count(Report::findByIdNotification($data['notification_id']))==0){
            Report::create([
                'user_id'=>$data['user_id'],
                'notification_id'=>$data['notification_id'],
                'message' => $data['message'],
                'status' =>'Entregado',
            ]);

        }

        return redirect()->route('gestion.notifications');
    }

    public function statusUpdate(Notification $notification)
    {
        $data=request()->validate([
            'event_type'=> 'required',
            'event_status'=>'required',
            ]);
        $notification->update($data);
        return redirect()->route('gestion.clasification',compact('notification'));
    }

    public function showNotification(Notification $notification)
    {
        $eventDatas=EventData::findById($notification->event_datas_id);
        $patientDatas=PatientData::findById($notification->patient_datas_id);
        $consequence=Consequence::findById($patientDatas->consequence_id);
        $place=Place::findById($patientDatas->place_id);
        $classification=Classification::findById($eventDatas->classification_id);
        $eventName=EventsName::findById($eventDatas->event_name_id);
        $detail=Detail::findById($eventDatas->details_id);
        $placeEvent=Place::findById($eventDatas->place_id);
        $count= Notification::countByStatus('Por revisar');
        $id=Auth::id();
        $quantityReports=Report::countByStatusAndUser('Entregado',$id);
        $quantityAllReports=Report::countByStatus('Entregado');
        $quantityAllImpPlans=ImprovementPlan::countByStatus(3);
        $quantityImpPlans=ImprovementPlan::countByStatusAndUser(3,$id);


        return view('gestion.notifications.showNotification', compact('quantityAllImpPlans','quantityImpPlans','quantityAllReports','quantityReports','count','notification','detail','placeEvent','eventDatas','patientDatas','consequence','place','classification','eventName'));
    }

    public function clasification(Notification $notification){
        $users=User::all();
        $eventDatas=EventData::findById($notification->event_datas_id);
        $patientDatas=PatientData::findById($notification->patient_datas_id);
        $name_patient=$patientDatas->name_patient;
        $event_date=$eventDatas->event_date;
        $place = Place::findById($eventDatas->place_id)->place;
        $count= Notification::countByStatus('Por revisar');
        $id=Auth::id();
        $quantityReports=Report::countByStatusAndUser('Entregado',$id);
        $quantityAllReports=Report::countByStatus('Entregado');
        $quantityAllImpPlans=ImprovementPlan::countByStatus(3);
        $quantityImpPlans=ImprovementPlan::countByStatusAndUser(3,$id);

        return view('gestion.notifications.clasification',compact('quantityAllImpPlans','quantityImpPlans','quantityAllReports','quantityReports','count','notification','users','name_patient','event_date','place'));
    }

    public function causes(Notification $notification){
        $count= Notification::countByStatus('Por revisar');
        $origins=Origin::all();
        $contributoryFactors=ContributoryFactor::all();
        $id=Auth::id();
        $quantityReports=Report::countByStatusAndUser('Entregado',$id);
        $quantityAllReports=Report::countByStatus('Entregado');
        $quantityAllImpPlans=ImprovementPlan::countByStatus(3);
        $quantityImpPlans=ImprovementPlan::countByStatusAndUser(3,$id);

        return view('gestion.notifications.causes',compact('quantityAllImpPlans','quantityImpPlans','quantityAllReports','quantityReports','count','notification','origins','contributoryFactors'));
    }


}
