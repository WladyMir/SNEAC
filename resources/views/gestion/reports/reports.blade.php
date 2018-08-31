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

@section('title card','Informes asignados')

@section('content')

    <div class="bs-component">
        <table class="table table-hover table-justified">
            <thead>
            <tr>
                <th scope="col">Nombre del paciente</th>
                <th scope="col">Lugar de ocurrencia del evento</th>
                <th scope="col">Fecha Notificación</th>
                <th scope="col">Nombre del evento</th>
                <th scope="col">Tipo de Evento</th>
                <th scope="col">Estado del informe</th>


            </tr>
            </thead>
            <tbody>
            @foreach($reports as $report)
                <tr class="table-default">
                    @foreach($notifications as $notification)

                        @if($report->notification_id == $notification->id)
                            @foreach($patientDatas as $patientData)
                                @if($patientData->id == $notification->patient_datas_id)
                                    <td>{{$patientData->name_patient}}</td>
                                @endif
                            @endforeach
                            @foreach($eventDatas as $eventData)
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
                        @endif


                    @endforeach
                    <td>{{$report->status}}</td>
                    <td><a href="{{route('reports.showReport',$report)}}" class="btn btn-primary">Informe</a>
                        <p></p>
                        @if($report->status=='Finalizado');
                        <a href="{{route('reports.pdf',$report)}}" class="btn btn-primary">Descargar</a>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection