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

@section('title card','Todos los Planes de Mejora')

@section('content')

    @if(auth()->user()->is_admin)
        <div class="form-group">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('improvementPlans.improvementPlans') }}">Asignados</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('improvementPlans.allImprovementPlans') }}">Todos</a>
                </li>

            </ul>

        </div>
    @endif

    <div class="bs-component">
        <table class="table table-hover table-justified">
            <thead>
            <tr>
                <th scope="col">Responsable de escribir el Plan de Mejora</th>
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
                    <td>{{$improvementPlan->user->name}}</td>
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
                                    <td>
                                        <a href="{{route('improvementPlans.makeImprovementPlan',$improvementPlan)}}" class="btn btn-primary">Plan de Mejora</a><p></p>
                                        <a href="{{route('$improvementPlans.pdf',$improvementPlan)}}" class="btn btn-primary">Descargar</a>
                                    </td>
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