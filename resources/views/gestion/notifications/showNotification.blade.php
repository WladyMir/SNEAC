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
    <p></p>

    <div class="row">
        <div class="col-3"><strong>NOMBRE DEL PACIENTE:</strong></div>
        <div class="col-9">{{$notification->name_patient}}</div>
    </div>
    <p></p>
    <div class="row">
        <div class="col-3"><strong>RUT:</strong></div>
        <div class="col-3">{{$notification->rut}}</div>

        <div class="col-2"><strong>EDAD:</strong></div>
        <div class="col-4">{{$notification->age}}</div>
    </div>
    <p></p>
    <div class="row">
        <div class="col-3"><strong>DIAGNÓSTICO:</strong></div>
        <div class="col-9">{{$notification->diagnostic}}</div>
    </div>
    <p></p>
    <div class="row">
        <div class="col-3"><strong>FECHA DE EVENTO:</strong></div>
        <div class="col-3">{{$notification->event_date}}</div>

        <div class="col-2" for="event_time" ><strong>HORA DEL EVENTO: </strong></div>
        <div class="col-4">{{$notification->event_time}}</div>
    </div>
    <p></p>
    <div class="row">
        <div class="col-3"><strong>SERVICIO/UNIDAD DE OCURRENCIA</strong></div>
        <div class="col-9">{{$notification->occurrencePlace->place}}</div>
    </div>
    <p></p>
    <div class="row">
        <div class="col-3"><strong>IDENTIFICACIÓN DE QUIEN NOTIFICA:</strong></div>
        <div class="col-9">{{$notification->notifier_name}}</div>
    </div>
    <p></p>
    <div class="row">
        <div class="col-3"><strong>SERVICIO/UNIDAD QUE NOTIFICA:</strong></div>
        <div class="col-9">{{$notification->notifierPlace->place}}</div>
    </div>
    <p></p>
    <div class="row">
        <div class="col-3"><strong>DESCRIPCIÓN DEL EVENTO: (PRECISA Y DETALLADA)</strong></div>
        <div class="col-9">{{$notification->description}}</div>
    </div>
    <p></p>
    <div class="row">
        <div class="col-3"><strong>CONSECUENCIA DEL EVENTO:</strong></div>
        <div class="col-3">

            @if ($notification->event_consequence === 0)
                SIN LESIÓN
            @elseif ($notification->event_consequence === 1)
                LESIÓN LEVE
            @elseif ($notification->event_consequence === 2)
                LESIÓN MODERADA
            @elseif ($notification->event_consequence === 3)
                LESIÓN GRAVE
            @else
                MUERTE
            @endif
        </div>
        <div class="col-3"><strong>LOS HECHOS FUERON REGISTRADOS EN LA FICHA CLÍNICA DEL USUARIO:</strong></div>
        <div class="col-3">
            @if ($notification->event_consequence === 0)
                SI
            @elseif ($notification->event_consequence === 1)
                NO
            @else
                SE DESCONOCE
            @endif
        </div>

    </div>

    <button class="btn btn-primary" href="{{route('gestion.clasification',$notification)}}">Clasificacion</button>




@endsection


