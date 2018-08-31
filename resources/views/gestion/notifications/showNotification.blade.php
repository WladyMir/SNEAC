@extends('layout')

@section('title','Administracion')

@section('menu')
    @include('includes.menu',['c'=>$count,
    'quantityReports'=>$quantityReports,
    'quantityAllReports'=>$quantityAllReports,
    'quantityImpPlans'=>$quantityImpPlans,
    'quantityAllImpPlans'=>$quantityAllImpPlans,
    ])
@endsection

@section('title card','Detalles')

@section('content')

    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" href="{{ route('gestion.showNotification',$notification) }}">Detalles</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('gestion.clasification',$notification)}}">Clasificacion</a>
        </li>

    </ul>

    <div class="col-sm-12">
        <div class="row">
            <div class="col-6">
                <label for="staticName" class="col-form-label"><strong>Nombre de Paciente </strong> </label>
                <div>
                    <input type="text" readonly="" class="form-control-plaintext" id="staticName" value="{{$patientDatas->name_patient}}">
                </div>

                <label for="staticDate" class="col-form-label"><strong>Fecha de Ingreso </strong></label>
                <div>
                    <input type="text" readonly="" class="form-control-plaintext " id="staticDate" value="{{$patientDatas->admission_date}}">
                </div>

                <label for="staticRut" class="col-form-label"><strong>Rut</strong>   </label>
                <div>
                    <input type="text" readonly="" class="form-control-plaintext" id="staticRut" value="{{$patientDatas->rut}}">
                </div>

                <label for="staticGender" class="col-form-label"><strong>Sexo</strong></label>
                <div>
                    <input type="text" readonly="" class="form-control-plaintext" id="staticGender" value="{{$patientDatas->gender}}">
                </div>

                <label for="staticPatientClasification" class="col-form-label"><strong>Clasificacion del Paciente</strong></label>
                <div>
                    <input type="text" readonly="" class="form-control-plaintext" id="staticPatientClasification" value="{{$patientDatas->patient_classification}}">
                </div>

                <label for="staticPatientType" class="col-form-label"><strong>Tipo de Paciente</strong></label>
                <div>
                    <input type="text" readonly="" class="form-control-plaintext" id="staticPatientType" value="{{$patientDatas->patient_type}}">
                </div>
                @if($patientDatas->patient_type==='hospitalizado')
                    <label for="staticBed" class="col-form-label"><strong>Cama</strong></label>
                    <div>
                        <input type="text" readonly="" class="form-control-plaintext" id="staticBed" value="{{$patientDatas->bed}}">
                    </div>
                @else
                    <label for="staticPlace" class="col-form-label"><strong>Servicio</strong></label>
                    <div>
                        <input type="text" readonly="" class="form-control-plaintext" id="staticPlace" value="{{$place->place}}">
                    </div>
                @endif




                <label for="staticObservation" class="col-form-label"><strong>Observaciones:</strong></label>
                <div>
                    <p>{{$patientDatas->observation}}</p>
                </div>

                <label for="staticConequences" class="col-form-label"><strong>Consecuencias:</strong></label>
                <div>
                    <p>{{$consequence->consequence}}</p>
                </div>


            </div>
            <div class="col-6">
                <label for="staticDateEvent" class="col-form-label"><strong>Fecha del Evento :</strong></label>
                <div>
                    <input type="text" readonly="" class="form-control-plaintext " id="staticDateEvent" value="{{$eventDatas->event_date}}">
                </div>

                <label for="staticTime" class="col-form-label"><strong>Hora del Evento :</strong></label>
                <div>
                    <input type="text" readonly="" class="form-control-plaintext " id="staticTime" value="{{$eventDatas->event_time}}">
                </div>
                <label for="staticTime" class="col-form-label"><strong>Clasificación :</strong></label>
                <div>
                    <input type="text" readonly="" class="form-control-plaintext " id="staticTime" value="{{$classification->name_classification}}">
                </div>
                <label for="staticNameEvent" class="col-form-label"><strong>Nombre del Evento :</strong></label>
                <div>
                    <p>{{$eventName->name}}</p>
                </div>
                @if($eventDatas->details_id===null)
                    <label for="staticDetailText" class="col-form-label"><strong>Detalles</strong></label>
                    <div>
                        <input type="text" readonly="" class="form-control-plaintext" id="staticDetailText" value="{{$eventDatas->detail_text}}">
                    </div>
                @else
                    <label for="staticDetail" class="col-form-label"><strong>Detalles</strong></label>
                    <div>
                        <input type="text" readonly="" class="form-control-plaintext" id="staticDetail" value="{{$detail->detail}}">
                    </div>
                @endif
                <label for="staticPlace" class="col-form-label"><strong>Lugar del evento</strong></label>
                <div>
                    <input type="text" readonly="" class="form-control-plaintext" id="staticPlace" value="{{$placeEvent->place}}">
                </div>
                <label for="staticDescription" class="col-form-label"><strong>Descripción</strong></label>
                <div>
                    <p>{{$eventDatas->description}}</p>
                </div>
                <label for="staticPreventionMeasures" class="col-form-label"><strong>Medidas Preventivas</strong></label>
                <div>
                    <input type="text" readonly="" class="form-control-plaintext" id="staticPreventionMeasures" value="{{$eventDatas->prevention_measures}}">
                </div>
                <label for="staticMeasuresTaken" class="col-form-label"><strong>Medidas Adoptadas</strong></label>
                <div>
                    <p>{{$eventDatas->measures_taken}}</p>
                </div>




            </div>
        </div>
    </div>


@endsection


