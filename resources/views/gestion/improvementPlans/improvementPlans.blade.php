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

    @if(auth()->user()->is_admin)
        <div class="form-group">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('improvementPlans.improvementPlans') }}">Asignados</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('improvementPlans.allImprovementPlans') }}">Todos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('improvementPlans.assignedActivities') }}">Actividades Asignadas</a>
                </li>


            </ul>

        </div>
    @endif

    <div class="bs-component">
        <table class="table table-hover table-justified">
            <thead>
            <tr>
                <th scope="col">Lugar de ocurrencia del evento</th>
                <th scope="col">Fecha Evento</th>
                <th scope="col">Tipo de Evento</th>
                <th scope="col">Participantes plan de mejora</th>
            </tr>
            </thead>
            <tbody>
            @foreach($improvementPlans as $improvementPlan)
                <tr class="table-default">
                    <td>{{$improvementPlan->report->place}}</td>
                    <td>{{$improvementPlan->report->event_date}}</td>
                    <td>
                        @if ($improvementPlan->report->notification->event_type === 0)
                            Sin Clasificar
                        @elseif ($improvementPlan->report->notification->event_type === 1)
                            Incidente
                        @elseif ($improvementPlan->report->notification->event_type === 2)
                            Evento Adverso
                        @else
                            Evento Centinela
                        @endif
                    </td>
                    <td>
                    @foreach($participants as $participant)
                        @if($improvementPlan->report->id == $participant->report_id)
                                {{$participant->name}}<br />
                            @endif
                    @endforeach
                    </td>
                    <td>
                        <a href="{{route('improvementPlans.makeImprovementPlan',$improvementPlan)}}" class="btn btn-primary">Plan de Mejora</a><p></p>
                        <a href="{{route('$improvementPlans.pdf',$improvementPlan)}}" class="btn btn-primary">Descargar</a>
                    </td>

                </tr>
            @endforeach

            </tbody>
        </table>
    </div>


@endsection

@section('sidebar')
    @parent
@endsection