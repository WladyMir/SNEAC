<?php

namespace App\Http\Controllers;

use App\ActivitiesImprovementPlan;
use App\ActivityResponsable;
use App\EventData;
use App\EventsName;
use App\ImprovementPlan;
use App\MonitoringResponsable;
use App\Notification;
use App\Participant;
use App\Place;
use App\Report;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\Snappy\Facades\SnappyPdf as PDF;

class ImprovementPlanController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }



    public function improvementPlans()
    {
        $id = Auth::id();
        $improvementPlans=ImprovementPlan::findByIdUser($id);
        $participants=Participant::all();
        $reports=Report::all();

        $count= Notification::countByStatus(0);
        $quantityReports=Report::countByStatusAndUser(0,$id);
        $quantityAllReports=Report::countByStatus(0);
        $quantityAllImpPlans=ImprovementPlan::countByStatus(3);
        $quantityImpPlans=ImprovementPlan::countByStatusAndUser(3,$id);



        return view('gestion.improvementPlans.improvementPlans',
            compact('quantityAllImpPlans',
                'quantityImpPlans',
                'quantityAllReports',
                'count',
                'quantityReports',
                'improvementPlans',
                'participants',
                'eventDatas',
                'notifications',
                'reports',
                'names',
                'places'
            ));
    }


    public function allImprovementPlans(){

        $id = Auth::id();
        $improvementPlans=ImprovementPlan::all();
        $participants=Participant::all();

        $count= Notification::countByStatus(0);
        $quantityReports=Report::countByStatusAndUser(0,$id);
        $quantityAllReports=Report::countByStatus(0);
        $quantityAllImpPlans=ImprovementPlan::countByStatus(3);
        $quantityImpPlans=ImprovementPlan::countByStatusAndUser(3,$id);



        return view('gestion.improvementPlans.allImprovementPlans',
            compact('quantityAllImpPlans',
                'quantityImpPlans',
                'quantityAllReports',
                'count',
                'quantityReports',
                'improvementPlans',
                'participants'
            ));
    }

    public function activityMonitoring(){
        $id = Auth::id();

        $count= Notification::countByStatus(0);
        $quantityReports=Report::countByStatusAndUser(0,$id);
        $quantityAllReports=Report::countByStatus(0);
        $quantityAllImpPlans=ImprovementPlan::countByStatus(3);
        $quantityImpPlans=ImprovementPlan::countByStatusAndUser(3,$id);

        $monitoringResponsables=MonitoringResponsable::findByIdUser($id);
        $activityResponsables=ActivityResponsable::all();

        return view('gestion.improvementPlans.activityMonitoring',
            compact('quantityAllImpPlans',
                'quantityImpPlans',
                'quantityAllReports',
                'count',
                'quantityReports',
                'monitoringResponsables',
                'activityResponsables'
            )
        );
    }

    public function updateStatusActivity(){
        $data=request()->validate([
            'activity_id' =>'required',
        ]);
        $actImpPlan=ActivitiesImprovementPlan::findById($data['activity_id']);
        if($actImpPlan->status==0){
            $actImpPlan->update([
                'status' => 1,
            ]);
        }
        else{
            $actImpPlan->update([
                'status' => 0,
            ]);
        }
        $id = Auth::id();

        $count= Notification::countByStatus(0);
        $quantityReports=Report::countByStatusAndUser(0,$id);
        $quantityAllReports=Report::countByStatus(0);
        $quantityAllImpPlans=ImprovementPlan::countByStatus(3);
        $quantityImpPlans=ImprovementPlan::countByStatusAndUser(3,$id);

        $monitoringResponsables=MonitoringResponsable::findByIdUser($id);
        $activityResponsables=ActivityResponsable::all();

        return view('gestion.improvementPlans.activityMonitoring',
            compact('quantityAllImpPlans',
                'quantityImpPlans',
                'quantityAllReports',
                'count',
                'quantityReports',
                'monitoringResponsables',
                'activityResponsables'
            )
        );

    }
    public function assignedActivities()
    {
        $id = Auth::id();
        $count= Notification::countByStatus(0);
        $quantityReports=Report::countByStatusAndUser(0,$id);
        $quantityAllReports=Report::countByStatus(0);
        $quantityAllImpPlans=ImprovementPlan::countByStatus(3);
        $quantityImpPlans=ImprovementPlan::countByStatusAndUser(3,$id);

        $assignedActivities=ActivityResponsable::findByIdUser($id);

        return view('gestion.improvementPlans.assignedActivities',
            compact('quantityAllImpPlans',
                'quantityImpPlans',
                'quantityAllReports',
                'count',
                'quantityReports',
                'assignedActivities'
            )
        );

    }

    public function createPdf(ImprovementPlan $improvementPlan)
    {
        $activitiesImprovementPlans=ActivitiesImprovementPlan::findByIdImprovementPlan($improvementPlan->id);
        $activityResponsables=ActivityResponsable::findByIdImprovementPlan($improvementPlan->id);
        $monitoringResponsables=MonitoringResponsable::findByIdImprovementPlan($improvementPlan->id);

        $pdf=PDF::loadView('gestion.improvementPlans.pdf',
            compact('improvementPlan',
                'monitoringResponsables',
                'activityResponsables',
                'activitiesImprovementPlans'))
            ->setOrientation('landscape')
            ->setOption('encoding', 'utf-8')
            ->setPaper('a4')
            ->setOption('margin-bottom', 0);
        return $pdf->download('Plan de Mejora.pdf');
    }

    public function makeImprovementPlan(ImprovementPlan $improvementPlan){
        $activitiesImprovementPlans=ActivitiesImprovementPlan::findByIdImprovementPlan($improvementPlan->id);
        $id = Auth::id();
        $count= Notification::countByStatus(0);
        $quantityReports=Report::countByStatusAndUser(0,$id);
        $quantityAllReports=Report::countByStatus(0);
        $quantityAllImpPlans=ImprovementPlan::countByStatus(3);
        $quantityImpPlans=ImprovementPlan::countByStatusAndUser(3,$id);

        $users=User::all();
        $activityResponsables=ActivityResponsable::findByIdImprovementPlan($improvementPlan->id);
        $monitoringResponsables=MonitoringResponsable::findByIdImprovementPlan($improvementPlan->id);

        return view('gestion.improvementPlans.makeImprovementPlans',
            compact('monitoringResponsables',
            'activityResponsables',
                'users',
                'quantityAllImpPlans',
                'quantityImpPlans',
                'quantityAllReports',
                'count',
                'quantityReports',
                'improvementPlan',
                'activitiesImprovementPlans'
            ));
    }

    public function addActivityAux(ImprovementPlan $improvementPlan){
        $activity=ActivitiesImprovementPlan::create([
            'improvement_plan_id' => $improvementPlan->id,
            'status' => 0,
        ]);

        return redirect()->route('improvementPlans.addActivity2',[$improvementPlan,$activity]);

    }

    public function addActivity2(ImprovementPlan $improvementPlan, ActivitiesImprovementPlan $activity){
        $activitiesImprovementPlans=ActivitiesImprovementPlan::findByIdImprovementPlan($improvementPlan->id);
        $id = Auth::id();
        $count= Notification::countByStatus(0);
        $quantityReports=Report::countByStatusAndUser(0,$id);
        $quantityAllReports=Report::countByStatus(0);
        $quantityAllImpPlans=ImprovementPlan::countByStatus(3);
        $quantityImpPlans=ImprovementPlan::countByStatusAndUser(3,$id);

        $users=User::all();

        $responsables=ActivityResponsable::findByIdActivity($activity->id);
        //dd($responsables);
        $monitoringResponsables=MonitoringResponsable::findByIdActivity($activity->id);


        return view('gestion.improvementPlans.addActivity',compact(
            'monitoringResponsables',
            'responsables',
            'activity',
            'activitiesImprovementPlans',
            'users',
            'quantityAllImpPlans',
            'quantityImpPlans',
            'quantityAllReports',
            'count',
            'quantityReports',
            'improvementPlan'));

    }

    public function activityEdit(ActivitiesImprovementPlan $activity){
        $id = Auth::id();
        $count= Notification::countByStatus(0);
        $quantityReports=Report::countByStatusAndUser(0,$id);
        $quantityAllReports=Report::countByStatus(0);
        $quantityAllImpPlans=ImprovementPlan::countByStatus(3);
        $quantityImpPlans=ImprovementPlan::countByStatusAndUser(3,$id);

        $responsables=ActivityResponsable::findByIdActivity($activity->id);
        $monitoringResponsables=MonitoringResponsable::findByIdActivity($activity->id);
        $users=User::all();



        return view('gestion.improvementPlans.editActivityImprovementPlan',compact('quantityAllImpPlans',
            'quantityImpPlans',
            'quantityAllReports',
            'count',
            'quantityReports',
            'activity',
            'responsables',
            'users',
            'monitoringResponsables'));
    }
    public function addResponsableMonitoring(){
        $data=request()->validate([
            'user_id'=>'required',
            'activity_id'=> 'required',
            'improvement_plan_id'=> 'required',
        ]);

        MonitoringResponsable::create([
            'user_id'=>$data['user_id'],
            'improvement_plan_id' =>$data['improvement_plan_id'],
            'activity_id' =>$data['activity_id'],
            'name' => User::findById($data['user_id'])->name,
            'labor' => User::findById($data['user_id'])->labor,
        ]);
        return response()->json(['success'=>'Se agrego exitosamente','activity_id'=>$data['activity_id']]);
    }

    public  function addResponsable(){
        //dd('estoy aqui');
        $data=request()->validate([
            'user_id'=>'required',
            'labor' => 'required',
            'activity_id'=> 'required',
            'improvement_plan_id'=> 'required',
        ]);
        ActivityResponsable::create([
            'user_id'=>$data['user_id'],
            'position'=>$data['labor'],
            'activity_id' =>$data['activity_id'],
            'improvement_plan_id' =>$data['improvement_plan_id'],
        ]);
        //dd($data);

        return response()->json(['success'=>'Se agrego exitosamente','activity_id'=>$data['activity_id']]);
    }

    public function addActivity(){
        $data=request()->validate([
            'activity'=>'required',
            'responsable'=>'required',
            'date'=>'required',
            'indicator'=>'required',
            'responsible_monitoring'=>'required',
            'date_monitoring'=>'required',
            'improvement_plan_id'=>'required',
        ]);
        ActivitiesImprovementPlan::create([
            'activity'=>$data['activity'],
            'responsable'=>$data['responsable'],
            'date'=>$data['date'],
            'indicator'=>$data['indicator'],
            'responsible_monitoring'=>$data['responsible_monitoring'],
            'date_monitoring'=>$data['date_monitoring'],
            'improvement_plan_id'=>$data['improvement_plan_id'],
        ]);
        //dd($data);

        return response()->json(['success'=>'Se agrego exitosamente','improvement_plan_id'=>$data['improvement_plan_id']]);
    }
    public function destroyActivity($id)
    {
        $activitiesImprovementPlans=ActivitiesImprovementPlan::findById($id);
        $improvementPlan=ImprovementPlan::findById($activitiesImprovementPlans->improvement_plan_id);

        $activitiesImprovementPlans->delete();

        return redirect()->route('improvementPlans.makeImprovementPlan',$improvementPlan);
    }
    public function updateImprovementPlan(ImprovementPlan $improvementPlan){
        $data=request()->validate([
            'objective'=>'required',
            'scope'=>'required',
        ]);
        $improvementPlan->update($data);

        return redirect()->route('improvementPlans.makeImprovementPlan',$improvementPlan);

    }




    public function addActivityToImprovementPlan(ActivitiesImprovementPlan $activity){
        $data=request()->validate([
            'activity'=>'required',
            'date'=>'required',
            'indicator'=>'required',
            'date_indicator'=>'required',
            'date_monitoring'=>'required',
            'improvement_plan_id'=>'required',
            'detail_monitors'=>'required',
        ]);

        $activity->update($data);
        $improvementPlan=ImprovementPlan::findById($data['improvement_plan_id']);
        return redirect()->route('improvementPlans.makeImprovementPlan',$improvementPlan);
    }

    function destroyResponsable($id)
    {
        $responsable=ActivityResponsable::findById($id);

        $responsable->delete();

        return response()->json(['success'=>'Se elimino exitosamente','activity_id'=>$responsable->activity_id]);
    }
    function destroyResponsableMonitoring($id){
        $responsableM=MonitoringResponsable::findById($id);

        $responsableM->delete();

        return response()->json(['success'=>'Se elimino exitosamente','activity_id'=>$responsableM->activity_id]);
    }
}
