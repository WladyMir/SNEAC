<?php

namespace App\Http\Controllers;

use App\Classification;
use App\Consequence;
use App\ContributoryFactor;
use App\Detail;
use App\EventsName;
use App\Mail\NewNotification;
use App\Mail\NotificationNotice;
use App\PatientData;
use App\EventData;
use App\Place;
use App\Notification;
use App\User;
use Faker\Provider\DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use ValidateRequests;
use Freshwork\ChileanBundle\Rut;

class NotificationController extends Controller
{
    public function getFactorForOrigin($id){

        return ContributoryFactor::where('origin_id',$id)->get();
    }
    public function getEventsForClassification($id){

        return EventsName::where('classifications_id',$id)->get();
    }
    public function getDetailsForNameEvent($id){
        return Detail::where('event_name_id',$id)->get();
    }
    public function index()

    {
        $title = 'Listado de notifiaciones';
        return view('notifications.index',compact('title'));
    }

    public function newNotification(){

        $places = Place::all();

        //dd($concequences);

        return view('notifications.patient',compact('consequences','places'));
    }

    public function storeNotification(){
        $data = request()->validate([
            'name_patient' =>'required',
            'rut' => 'required|cl_rut',
            'age' => 'required|integer',
            'diagnostic' => 'required|max:100',
            'event_date' => 'required',
            'event_time' => 'required',
            'occurrence_place_id' =>'required',
            'notifier_name' =>'nullable',
            'notifier_place_id' =>'required',
            'description' =>'required',
            'event_consequence'=>'required',
            'clinical_record'=>'required',
        ],[
            'name_patient.required' => 'El campo nombre es obligatorio',
            'rut.cl_rut' => 'El campo debe ser un rut valido',
            'age.required' => 'El campo edad es obligatorio',
            'age.integer' => 'El campo edad debe ser un numero',
            'diagnostic.required' => 'El campo diagnostico es obligatorio',
        ]);

        //dd($data);
        $notification=Notification::create([
            'name_patient' =>$data['name_patient'],
            'rut' => $data['rut'],
            'age' => $data['age'],
            'diagnostic' => $data['diagnostic'],
            'event_date' => $data['event_date'],
            'event_time' => $data['event_time'],
            'occurrence_place_id' =>$data['occurrence_place_id'],
            'notifier_name' =>$data['notifier_name'],
            'notifier_place_id' =>$data['notifier_place_id'],
            'description' =>$data['description'],
            'event_consequence'=>$data['event_consequence'],
            'clinical_record'=>$data['clinical_record'],
            'event_type'=>0,
            'event_status'=>0,
        ]);
        $date=new \Datetime();


        $notification->update([
            'identificator'=> $date->format('m-Y/'). $notification->id,
        ]);
        $admins=User::findByAdmin()->pluck('email');
        $qualityAttendant=User::findByIdPlace($notification->occurrence_place_id);

        Mail::to($admins)
            ->send(new NewNotification($notification));

        Mail::to($qualityAttendant)
            ->send(new NotificationNotice($notification));

        $title = 'Listado de notifiaciones';
        return view('notifications.index',compact('title'));

    }
    public function event()
    {
        $places = Place::all();
        $classifications = Classification::all();
        $eventsNames = EventsName::all();
        $details = Detail::all();
        $patientDatas=PatientData::all();
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
            'rut' => 'required|cl_rut',
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
            PatientData::create([
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
            PatientData::create([
                'name_patient' => $data['name_patient'],
                'admission_date' => $data['admission_date'],
                'rut'=>$data['rut'],
                //'rut' => Rut::parse($data['rut'])->format(Rut::FORMAT_COMPLETE),
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
            $event_datas=EventData::create([
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

            $event_datas=EventData::create([
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
        $patient_datas= PatientData::findById($data['id_patient_datas']);

        Notification::create([
            'patient_datas_id'=>$data['id_patient_datas'],
            'event_datas_id'=>$id_event_datas,
            'event_type'=> 'Sin clasificar',
            'event_status'=>'Por revisar',
            'place_id'=>$data['place_id'],
            'event_date'=>$data['event_date'],
            'event_name_id'=> $data['event_name_id'],
            'name_patient'=>$patient_datas->name_patient,
        ]);

        $placeEvent=Place::findById($event_datas->place_id);

        $consequence=Consequence::findById($patient_datas->consequence_id);
        $classification=Classification::findById($event_datas->classification_id);
        $event_name=EventsName::findById($event_datas->event_name_id);


        Mail::to('wladimir.cerda@usach.cl','Wlady')
            ->send(new NewNotification($placeEvent,$patient_datas,$consequence,$classification,$event_name, $event_datas));

        return redirect()->route('notifications.index');

    }
}
