<?php

namespace App\Http\Controllers;

use App\Cause;
use App\ContributoryFactorByReport;
use App\EventData;
use App\EventsName;
use App\ImprovementPlan;
use App\Notification;
use App\Origin;
use App\Participant;
use App\PatientData;
use App\Place;
use App\Report;
use App\ReportDate;
use App\UnsafeAction;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
//use Barryvdh\DomPDF\Facade as PDF;
use Barryvdh\Snappy\Facades\SnappyPdf as PDF;


class ReportController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }



    public function reports()
    {
        $id = Auth::id();
        $reports=Report::findByIdUser($id);


        $count= Notification::countByStatus(0);
        $quantityReports=Report::countByStatusAndUser(0,$id);
        $quantityAllReports=Report::countByStatus(0);
        $quantityAllImpPlans=ImprovementPlan::countByStatus(3);
        $quantityImpPlans=ImprovementPlan::countByStatusAndUser(3,$id);

        return view('gestion.reports.reports',compact(
            'quantityAllImpPlans',
            'quantityImpPlans',
            'quantityAllReports',
            'count',
            'quantityReports',
            'id',
            'reports'
        ));
    }

    public function allReports(){
        $id = Auth::id();
        $reports=Report::all();

        $count= Notification::countByStatus(0);
        $quantityReports=Report::countByStatusAndUser(0,$id);
        $quantityAllReports=Report::countByStatus(0);
        $quantityAllImpPlans=ImprovementPlan::countByStatus(3);
        $quantityImpPlans=ImprovementPlan::countByStatusAndUser(3,$id);

        return view('gestion.reports.allReports',compact('quantityAllImpPlans',
            'quantityImpPlans',
            'quantityAllReports',
            'count',
            'quantityReports',
            'reports'
        ));


    }

    public function showReport(Report $report){

        //dd($report->id);
        $id=Auth::id();
        $count= Notification::countByStatus(0);
        $quantityReports=Report::countByStatusAndUser(0,$id);
        $quantityAllReports=Report::countByStatus(0);
        $quantityAllImpPlans=ImprovementPlan::countByStatus(3);
        $quantityImpPlans=ImprovementPlan::countByStatusAndUser(3,$id);
        return view('gestion.reports.showReport',compact(
            'quantityAllImpPlans',
            'quantityImpPlans',
            'quantityAllReports',
            'count',
            'quantityReports',
            'report'
        ));

    }

    public function updateStatusReport(Report $report){
        $data=request()->validate([
            'status' =>'required',
        ]);

        $report->update([
            'status' => $data['status'],
        ]);
        if($report->status==1){
            $not=Notification::findById($report->notification_id);
            $not->update([
               'event_status'=> 3,
            ]);
            $im=ImprovementPlan::findByIdReport($report->id);

            if($im==null){
                $improvementPlan=ImprovementPlan::create([
                    'report_id' => $report->id,
                    'objective'=>'',
                    'scope'=>'',
                    'user_id'=>$report->user_id,
                    'status'=>0,
                ]);
            }

        }
        return redirect()->route('reports.reports');
    }
    public function createPdf(Report $report)
    {
        $cause=Cause::findById($report->unsafe_action_id);
        $unsafe_action=UnsafeAction::findById($report->unsafe_action_id);
        $report_dates = ReportDate::findByIdReport($report->id);
        $participants =Participant::findByIdReport($report->id);
        $contributory_factors=ContributoryFactorByReport::findByIdReport($report->id);
        $pdf=PDF::loadView('gestion.reports.pdf',compact(
            'report',
            'cause',
            'unsafe_action',
            'participants',
            'report_dates',
            'contributory_factors'
        ))->setPaper('a4')->setOption('margin-bottom', 0)->setOption('encoding', 'utf-8');
        return $pdf->download('informe.pdf');
    }

    public function makeReport(Report $report){
        $id=Auth::id();
        $participants =Participant::findByIdReport($report->id);
        $report_dates = ReportDate::findByIdReport($report->id);
        $contributory_factors=ContributoryFactorByReport::findByIdReport($report->id);
        $origins= Origin::all();

        $count= Notification::countByStatus(0);
        $quantityReports=Report::countByStatusAndUser(0,$id);
        $quantityAllReports=Report::countByStatus(0);
        $quantityAllImpPlans=ImprovementPlan::countByStatus(3);
        $quantityImpPlans=ImprovementPlan::countByStatusAndUser(3,$id);

        if($report->unsafe_action_id===null){
            $unsafe_action=UnsafeAction::create([
                'planningAction'=>"",
                'executionAction'=>"",
                'executionOmission'=>"",
                'planningOmission'=>"",
                'type_error'=>"",
            ]);
            $report->update([
                'unsafe_action_id'=>$unsafe_action->id,
            ]);
        }
        else{
            $unsafe_action=UnsafeAction::findById($report->unsafe_action_id);
        }
        if($report->cause_id===null){
            $cause=Cause::create([
                'root_cause' => "",
                'major_cause' => "",
            ]);
            $report->update([
                'cause_id'=>$cause->id,
            ]);

        }
        else{
            $cause=Cause::findById($report->unsafe_action_id);
        }



        return view('gestion.reports.makeReport',
            compact('report',
                'quantityAllImpPlans',
                'quantityImpPlans',
                'quantityAllReports',
                'count',
                'quantityReports',
                'participants',
                'report_dates',
                'origins',
                'contributory_factors',
                'unsafe_action',
                'cause')
        );
    }


    public function updateReport(Report $report){
        $data=request()->validate([
            'service_boss' => 'required',
            'supervisor' => 'required',
            'report_writer'=> 'required',
            'place'=> 'required',
            'narration'=> 'required',
            'date' => 'required',
            'name_research_leader' => 'required',
            'planningAction'=> 'nullable',
            'executionAction'=> 'nullable',
            'planningOmission'=> 'nullable',
            'executionOmission'=> 'nullable',
            'root_cause'=> 'nullable',
            'major_cause'=> 'nullable',
            'type_error'=>'nullable',
        ]);
        $unsafeAction= UnsafeAction::findById($report->unsafe_action_id);
        $unsafeAction->update([
            'planningAction'=>$data['planningAction'],
            'executionAction'=>$data['executionAction'],
            'executionOmission'=>$data['executionOmission'],
            'planningOmission'=>$data['planningOmission'],
            'type_error'=>$data['type_error'],
        ]);
        $cause=Cause::findById($report->cause_id);
        $cause->update([
            'root_cause' => $data['root_cause'],
            'major_cause' => $data['major_cause'],
        ]);

        $report->update([
            'service_boss'=>$data['service_boss'],
            'supervisor'=>$data['supervisor'],
            'report_writer'=>$data['report_writer'],
            'place'=>$data['place'],
            'narration'=>$data['narration'],
            'event_date'=>$data['date'],
            'name_research_leader'=>$data['name_research_leader'],
        ]);

        return redirect()->route('reports.showReport',$report);
    }
    public  function addParticipant(){
        //dd('estoy aqui');
        $data=request()->validate([
            'addParticipant'=>'required',
            'report_id' => 'required',
        ]);
        Participant::create([
            'name'=>$data['addParticipant'],
            'report_id'=>$data['report_id'],
            'participation' => 'null',
        ]);
        //dd($data);

        return response()->json(['success'=>'Se agrego exitosamente','report_id'=>$data['report_id']]);
    }

    public function addDate(){
        $data=request()->validate([
            'situation'=>'required',
            'date_situation' => 'required',
            'report_id' => 'required',
        ]);
        ReportDate::create([
            'situation'=> $data['situation'],
            'date_situation' => $data['date_situation'] ,
            'report_id' =>  $data['report_id'],

        ]);
        return response()->json(['success'=>'Se agrego fecha exitosamente','report_id'=>$data['report_id']]);
    }
    public function addContributoryFactor(){
        $data=request()->validate([
            'origin_id'=>'required',
            'detail' => 'required',
            'report_id' => 'required',
        ]);
        $origin=Origin::findById($data['origin_id']);



        ContributoryFactorByReport::create([
            'origin'=>$origin->origin,
            'factor' => '',
            'detail' => $data['detail'],
            'report_id' => $data['report_id'],
        ]);
        return response()->json([
            'success'=>'Se agrego factor contributivo exitosamente',
            'report_id'=>$data['report_id']]);

    }

    function destroyParticipant($id)
    {
        $participant=Participant::findById($id);

        $participant->delete();

        return response()->json(['success'=>'Se elimino exitosamente','report_id'=>$participant->report_id]);
    }


    function destroyDate($id)
    {
        $reportDate=ReportDate::findById($id);

        $reportDate->delete();

        return response()->json(['success'=>'Se elimino exitosamente','report_id'=>$reportDate->report_id]);
    }
    function destroyContributoryFactor($id)
    {
        $contributoryFactor=ContributoryFactorByReport::findById($id);

        $contributoryFactor->delete();

        return response()->json(['success'=>'Se elimino exitosamente','report_id'=>$contributoryFactor->report_id]);
    }
}
