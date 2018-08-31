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

@section('title card','Planes de Mejora')

@section('content')

    <div class="bs-component">
        <table class="table table-hover table-justified">
            <thead>
            <tr>
                <th scope="col">Nombre del evento</th>
                <th scope="col">Lugar de ocurrencia del evento</th>
                <th scope="col">Fecha Evento</th>
                <th scope="col">Tipo de Evento</th>
                <th scope="col">Participantes plan de mejora</th>
            </tr>
            </thead>
            <tbody>
            @foreach($improvementPlans as $improvementPlan)
                <tr class="table-default">
                    @foreach($reports as $report)
                        @if($report->id == $improvementPlan->report_id)
                            @foreach($notifications as $notification)
                                @if($report->notification_id == $notification->id)
                                    @foreach($eventDatas as $eventData)
                                        @if($eventData->id == $notification->event_datas_id)
                                            @foreach($names as$name)
                                                @if($name->id == $eventData->event_name_id)
                                                    <td>{{$name->name}}</td>
                                                @endif
                                            @endforeach
                                            @foreach($places as$place)
                                                @if($place->id == $eventData->place_id)
                                                    <td>{{$place->place}}</td>
                                                @endif
                                            @endforeach
                                            <td>{{$eventData->event_date}}</td>
                                        @endif
                                    @endforeach
                                    <td>{{$notification->event_type}}</td>
                                    <td>
                                    @foreach($participants as $participant)
                                        @if($report->id == $participant->report_id)
                                                {{$participant->name}}<br />
                                            @endif
                                    @endforeach
                                    </td>
                                    <td><a href="{{route('improvementPlans.makeImprovementPlan',$improvementPlan)}}" class="btn btn-primary">Plan de Mejora</a></td>
                                @endif
                            @endforeach
                        @endif

                    @endforeach

                </tr>
            @endforeach

            </tbody>
        </table>
    </div>


@endsection

@section('sidebar')
    @parent
@endsection