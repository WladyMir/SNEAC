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

        $count= Notification::countByStatus(0);
        $quantityReports=Report::countByStatusAndUser(0,$id);
        $quantityAllReports=Report::countByStatus(0);
        $quantityAllImpPlans=ImprovementPlan::countByStatus(3);
        $quantityImpPlans=ImprovementPlan::countByStatusAndUser(3,$id);

        return view('gestion.index',compact('title'
            ,'quantityAllImpPlans',
            'quantityImpPlans',
            'quantityAllReports',
            'quantityReports',
            'count'));
    }


    public function notifications()
    {
        $id=Auth::id();
        $notifications = Notification::all();


        $count= Notification::countByStatus(0);
        $quantityReports=Report::countByStatusAndUser(0,$id);
        $quantityAllReports=Report::countByStatus(0);
        $quantityAllImpPlans=ImprovementPlan::countByStatus(3);
        $quantityImpPlans=ImprovementPlan::countByStatusAndUser(3,$id);

        return view('gestion.notifications.notifications',compact(
            'quantityAllImpPlans',
            'quantityImpPlans',
            'quantityAllReports',
            'quantityReports',
            'count',
            'notifications'
        ));
    }

    public function administration()
    {
        $id=Auth::id();
        $count= Notification::countByStatus(0);
        $quantityReports=Report::countByStatusAndUser(0,$id);
        $quantityAllReports=Report::countByStatus(0);
        $quantityAllImpPlans=ImprovementPlan::countByStatus(3);
        $quantityImpPlans=ImprovementPlan::countByStatusAndUser(3,$id);
        return view('gestion.administration.administration',compact(
            'quantityAllImpPlans',
            'quantityImpPlans',
            'quantityAllReports',
            'quantityReports',
            'count'
        ));
    }

    public function improvementPlans()
    {
        $id=Auth::id();
        $count= Notification::countByStatus(0);
        $quantityReports=Report::countByStatusAndUser(0,$id);
        $quantityAllReports=Report::countByStatus(0);
        $quantityAllImpPlans=ImprovementPlan::countByStatus(3);
        $quantityImpPlans=ImprovementPlan::countByStatusAndUser(3,$id);

        return view('gestion.improvementPlans.improvementPlans',compact(
            'quantityAllImpPlans',
            'quantityImpPlans',
            'quantityAllReports',
            'quantityReports',
            'count'
        ));
    }
    public function reportAssignment(){
        $data=request()->validate([
            'user_id'=> 'required',
            'notification_id'=> 'required',
            'message' => 'required',
            ]);
        $r=Report::findByIdNotification($data['notification_id']);
        $notification= Notification::findById($data['notification_id']);
        if($r==null){
            Report::create([
                'user_id'=>$data['user_id'],
                'notification_id'=>$data['notification_id'],
                'message' => $data['message'],
                'status' =>0,
            ]);
            $notification->update([
                'event_status'=>2,
            ]);

        }
        elseif ($r->user_id!=$data['user_id']){
            $r->update([
                'user_id'=>$data['user_id'],
                'notification_id'=>$data['notification_id'],
                'message' => $data['message'],
            ]);
            $notification->update([
                'event_status'=>2,
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

        $places=Place::all();


        $id=Auth::id();
        $count= Notification::countByStatus(0);
        $quantityReports=Report::countByStatusAndUser(0,$id);
        $quantityAllReports=Report::countByStatus(0);
        $quantityAllImpPlans=ImprovementPlan::countByStatus(3);
        $quantityImpPlans=ImprovementPlan::countByStatusAndUser(3,$id);


        return view('gestion.notifications.showNotification', compact(
            'quantityAllImpPlans',
            'quantityImpPlans',
            'quantityAllReports',
            'quantityReports',
            'count',
            'notification',
            'places'));
    }

    public function clasification(Notification $notification){
        $users=User::all();


        $id=Auth::id();
        $count= Notification::countByStatus(0);
        $quantityReports=Report::countByStatusAndUser(0,$id);
        $quantityAllReports=Report::countByStatus(0);
        $quantityAllImpPlans=ImprovementPlan::countByStatus(3);
        $quantityImpPlans=ImprovementPlan::countByStatusAndUser(3,$id);

        $report=Report::findByIdNotification($notification->id);

        return view('gestion.notifications.clasification',compact(
            'quantityAllImpPlans',
            'quantityImpPlans',
            'quantityAllReports',
            'quantityReports',
            'count',
            'notification',
            'users',
            'report'
            ));
    }

    public function causes(Notification $notification){

        $origins=Origin::all();
        $contributoryFactors=ContributoryFactor::all();

        $id=Auth::id();
        $count= Notification::countByStatus(0);
        $quantityReports=Report::countByStatusAndUser(0,$id);
        $quantityAllReports=Report::countByStatus(0);
        $quantityAllImpPlans=ImprovementPlan::countByStatus(3);
        $quantityImpPlans=ImprovementPlan::countByStatusAndUser(3,$id);

        return view('gestion.notifications.causes',compact(
            'quantityAllImpPlans',
            'quantityImpPlans',
            'quantityAllReports',
            'quantityReports',
            'count',
            'notification',
            'origins',
            'contributoryFactors'
        ));
    }


}
