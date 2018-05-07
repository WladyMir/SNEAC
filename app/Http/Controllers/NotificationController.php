<?php

namespace App\Http\Controllers;

use App\Classifications;
use App\Consequences;
use App\Details;
use App\EventsNames;
use App\Mail\NewNotification;
use App\PatientDatas;
use App\EventDatas;
use App\Places;
use App\Notifications;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class NotificationController extends Controller
{
    public function getEventsForClassification($id){

        return EventsNames::where('classifications_id',$id)->get();
    }
    public function getDetailsForNameEvent($id){
        return Details::where('event_name_id',$id)->get();
    }
    public function index()

    {
        $title = 'Listado de usuarios';
        return view('notifications.index',compact('title'));
    }

    public function create(){
        $consequences= Consequences::all();

        $places = Places::all();

        //dd($concequences);

        return view('notifications.patient',compact('consequences','places'));
    }
    public function event()
    {
        $places = Places::all();
        $classifications = Classifications::all();
        $eventsNames = EventsNames::all();
        $details = Details::all();
        $patientDatas=PatientDatas::all();
        $id_patient_datas=$patientDatas->last()->id;
        return view('notifications.event',compact('classifications','places','eventsNames','details','id_patient_datas'));
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storePatientData()
    {
        $data = request()->validate([
            'name_patient' =>'nullable',
            'admission_date' => 'nullable',
            'rut' => 'required',
            'gender' => 'required',
            'patient_classification' => 'required',
            'observation' => 'required',
            'patient_type' =>'required',
            'place_id' =>'nullable',
            'consequence_id' =>'required',
            'bed' =>'nullable|integer',
        ]);
        //dd($data);

        if($data['patient_type'] === "ambulatorio"){
            PatientDatas::create([
                'name_patient' => $data['name_patient'],
                'admission_date' => $data['admission_date'],
                'rut' => $data['rut'],
                'gender' => $data['gender'],
                'patient_classification' => $data['patient_classification'],
                'observation' => $data['observation'],
                'consequence_id' => $data['consequence_id'],
                'patient_type' => $data['patient_type'],
                'place_id' => $data['place_id'],


            ]);
        }else{
            PatientDatas::create([
                'name_patient' => $data['name_patient'],
                'admission_date' => $data['admission_date'],
                'rut' => $data['rut'],
                'gender' => $data['gender'],
                'patient_classification' => $data['patient_classification'],
                'observation' => $data['observation'],
                'consequence_id' => $data['consequence_id'],
                'patient_type' => $data['patient_type'],
                'bed' => $data['bed'],


            ]);
        }




        return redirect()->route('notifications.event');
    }

    public function storeEventData(){

        $data = request()->validate([
            'event_time'=>'required',
            'event_date'=> 'required',
            'classification_id'=>'required',
            'event_name_id'=>'required',
            'details_id'=>'nullable',
            'detail_text'=>'nullable',
            'place_id'=>'required',
            'description'=>'required',
            'prevention_measures'=>'required',
            'measures_taken'=>'required',
            'id_patient_datas'=>'required',
        ]);
        //dd($data);
        if($data['details_id']===null){
            $event_datas=EventDatas::create([
                'event_date'=> $data['event_date'],
                'event_time'=>$data['event_time'],
                'classification_id'=>$data['classification_id'],
                'event_name_id'=>$data['event_name_id'],
                'details_id'=>$data['details_id'],
                'detail_text'=>$data['detail_text'],
                'place_id'=>$data['place_id'],
                'description'=>$data['description'],
                'prevention_measures'=>$data['prevention_measures'],
                'measures_taken'=>$data['measures_taken'],
            ]);

        }
        else{

            $event_datas=EventDatas::create([
                'event_date'=> $data['event_date'],
                'event_time'=>$data['event_time'],
                'classification_id'=>$data['classification_id'],
                'event_name_id'=>$data['event_name_id'],
                'details_id'=>$data['details_id'],
                'place_id'=>$data['place_id'],
                'description'=>$data['description'],
                'prevention_measures'=>$data['prevention_measures'],
                'measures_taken'=>$data['measures_taken'],
            ]);

        }
        $id_event_datas=$event_datas->id;

        Notifications::create([
            'patient_datas_id'=>$data['id_patient_datas'],
            'event_datas_id'=>$id_event_datas,
            'event_type'=> 'Sin Clasificar',
            'event_status'=>'Por revisar',

        ]);

        $placeEvent=Places::findById($event_datas->place_id);
        $patient_datas= PatientDatas::findById($data['id_patient_datas']);
        $consequence=Consequences::findById($patient_datas->consequence_id);
        $classification=Classifications::findById($event_datas->classification_id);
        $event_name=EventsNames::findById($event_datas->event_name_id);


        Mail::to('wladimir.cerda@usach.cl','Wlady')
            ->send(new NewNotification($placeEvent,$patient_datas,$consequence,$classification,$event_name, $event_datas));

        return redirect()->route('notifications.index');

    }
}
