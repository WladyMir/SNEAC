
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

@section('title card','Notificaciones')

@section('content')
    <div class="row">
        <div class="col-6">
            <div class="form-group row">
                <label for="filter" class="col-sm-3 col-form-label">Filtrar por:</label>
                <div class="col-sm-7">
                    <select class="form-control" name="filter" id="select_filter" >
                        <option value="3"> Seleccione un filtro</option>
                        <option value="0">Lugar</option>
                        <option value="1">Tipo de evento</option>
                        <option value="2">Estado del evento</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group row">
                <label for="detail" class="col-sm-3 col-form-label">Detalle:</label>
                <div class="col-sm-7">
                    <select class="form-control" name="detail" id="select_detail" >
                        <option value=""> Seleccione un filtro</option>
                    </select>
                </div>
            </div>
        </div>
    </div>




<div class="bs-component">
    <table class="table table-hover table-justified" id="tableNotifications">
        <thead>
        <tr>
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
            <td>{{$notification->event_type}}</td>
            @foreach($patientDatas as $patientData)
                @if($patientData->id == $notification->patient_datas_id)
                    <td>{{$patientData->name_patient}}</td>
                @endif
            @endforeach

            <td>{{$notification->event_status}}</td>
            <td><a href="{{ route('gestion.showNotification',[$notification]) }}" class="btn btn-primary">Gestionar</a></td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
<script src="/js/gestion/filters.js"></script>

@endsection

