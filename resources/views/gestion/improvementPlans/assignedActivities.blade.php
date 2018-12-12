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

@section('title card','Actividades Asignadas')

@section('content')


        <div class="form-group">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('improvementPlans.improvementPlans') }}">Asignados</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('improvementPlans.assignedActivities') }}">Actividades Asignadas</a>
                </li>
                @if(auth()->user()->is_admin)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('improvementPlans.allImprovementPlans') }}">Todos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('improvementPlans.activityMonitoring') }}">Monitoreo Actividades</a>
                    </li>
                @endif
            </ul>

        </div>


    <div class="bs-component">
        <table class="table table-hover table-justified">
            <thead>
            <tr>
                <th scope="col">ACTIVIDAD</th>
                <th scope="col">RESPONSABLE</th>
                <th scope="col">FECHA</th>
                <th scope="col">VERIFICABLE O INDICADOR</th>
                <th scope="col">FECHA MONITOREO</th>
            </tr>
            </thead>
            <tbody>
            @foreach($assignedActivities as $assignedActivity)

                <tr class="table-active">

                    <th scope="row">{{$assignedActivity->activity->activity}}</th>

                    <td>{{$assignedActivity->user->labor}} {{$assignedActivity->user->name}} {{$assignedActivity->position}}</td>
                    <td>{{$assignedActivity->activity->date}}</td>
                    <td>{{$assignedActivity->activity->indicator}}  {{$assignedActivity->activity->date_indicator}}</td>
                    <td>{{$assignedActivity->activity->date_monitoring}}</td>

                </tr>
            @endforeach


            </tbody>
        </table>
    </div>


@endsection

@section('sidebar')
    @parent
@endsection