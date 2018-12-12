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

@section('title card','Monitoreo de Actividades')

@section('content')


    <div class="form-group">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('improvementPlans.improvementPlans') }}">Asignados</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('improvementPlans.assignedActivities') }}">Actividades Asignadas</a>
            </li>
            @if(auth()->user()->is_admin)
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('improvementPlans.allImprovementPlans') }}">Todos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('improvementPlans.activityMonitoring') }}">Monitoreo Actividades</a>
                </li>
            @endif

        </ul>

    </div>


    <div class="bs-component">
        <table class="table table-hover table-justified" id="tableActMon">
            <thead>
            <tr>
                <th scope="col">ACTIVIDAD</th>
                <th scope="col">RESPONSABLE</th>
                <th scope="col">FECHA</th>
                <th scope="col">VERIFICABLE O INDICADOR</th>
                <th scope="col">FECHA MONITOREO</th>
                <th scope="col">ESTADO MONITOREO</th>
            </tr>
            </thead>
            <tbody>
            @foreach($monitoringResponsables as $monitoringResponsable)
                @if($monitoringResponsable->activity->status===0)
                    <tr class="table-danger">
                @else
                    <tr class="table-success">
                @endif



                    <th scope="row">{{$monitoringResponsable->activity->activity}}</th>

                    <td>
                        @foreach($activityResponsables as $activityResponsable)
                            @if($activityResponsable->activity_id===$monitoringResponsable->activity_id)
                                -{{$activityResponsable->user->labor}} {{$activityResponsable->user->name}} {{$activityResponsable->position}}<p></p>
                            @endif

                        @endforeach
                    </td>
                    <td>{{$monitoringResponsable->activity->date}}</td>
                    <td>{{$monitoringResponsable->activity->indicator}}  {{$monitoringResponsable->activity->date_indicator}}</td>
                    <td>{{$monitoringResponsable->activity->date_monitoring}}</td>
                    <td>@if($monitoringResponsable->activity->status===0)
                            Sin validar
                        @else
                            Validado
                        @endif</td>
                    <td>
                        <form method="POST" id="statusActivity"
                              action="{{ url("/gestion/PlanesDeMejoras/monitoreoActividades/updateStatusActivity/{$monitoringResponsable->activity->id}") }}" >
                            {{ method_field('PUT') }}
                            {{ csrf_field() }}
                            <input type="hidden" name="activity_id" value="{{$monitoringResponsable->activity->id}}">
                            @if($monitoringResponsable->activity->status===0)
                                <button type="submit" class="btn btn-primary" id="btnVal">Validar</button>
                            @else
                                <button type="submit" class="btn btn-primary" id="btnInVal">Sin Validar</button>
                            @endif
                        </form>
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