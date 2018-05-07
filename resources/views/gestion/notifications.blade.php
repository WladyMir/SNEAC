
@extends('layout')

@section('title','Administracion')

@section('title card','Notificaciones')

@section('content')

<div class="bs-component">
    <table class="table table-hover table-justified">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Lugar de ocurrencia del evento</th>
            <th scope="col">Fecha Notificación</th>
            <th scope="col">Nombre del evento</th>
            <th scope="col">Tipo de Evento</th>
            <th scope="col">Nombre del paciente</th>
            <th scope="col">Estado del evento</th>

        </tr>
        </thead>
        <tbody>
        @foreach($notifications as $notification)
        <tr class="table-default">
            <th scope="row">{{ $notification->id}}</th>
            @foreach($eventDatas as$eventData)
                @if($eventData->id == $notification->event_datas_id)
                    @foreach($places as$place)
                        @if($place->id == $eventData->place_id)
                            <td>{{$place->place}}</td>
                        @endif
                    @endforeach
                    <td>{{$eventData->event_date}}</td>
                    @foreach($names as$name)
                        @if($name->id == $eventData->event_name_id)
                            <td>{{$name->name}}</td>
                        @endif
                    @endforeach
                @endif
            @endforeach
            <td>Sin Clasificar</td>
            @foreach($patientDatas as $patientData)
                @if($patientData->id == $notification->patient_datas_id)
                    <td>{{$patientData->name_patient}}</td>
                @endif
            @endforeach

            <td>Por revisar</td>
            <td><a href="{{ route('gestion.showNotification',[$notification,$eventData,$patientData]) }}" class="btn btn-primary">Gestionar</a></td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>

@endsection

