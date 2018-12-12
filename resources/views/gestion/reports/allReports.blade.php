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

@section('title card','Todos los Informes')

@section('content')
    @if(auth()->user()->is_admin)
        <div class="form-group">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('reports.reports') }}">Asignados</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('reports.allReports') }}">Todos</a>
                </li>


            </ul>

        </div>
    @endif

    <div class="bs-component">
        <table class="table table-hover table-justified">
            <thead>
            <tr>
                <th scope="col">Id Notificación</th>
                <th scope="col">Nombre del paciente</th>
                <th scope="col">Lugar de ocurrencia del evento</th>
                <th scope="col">Fecha Notificación</th>
                <th scope="col">Tipo de Evento</th>
                <th scope="col">Estado del informe</th>
                <th scope="col">Encargado de realizar el informe</th>


            </tr>
            </thead>
            <tbody>
            @foreach($reports as $report)
                <tr class="table-default">
                    <td>{{$report->notification->identificator}}</td>
                    <td>{{$report->notification->name_patient}}</td>
                    <td>{{$report->notification->occurrencePlace->place}}</td>
                    <td>{{$report->notification->event_date}}</td>
                    <td>
                        @if ($report->notification->event_type === 0)
                            Sin Clasificar
                        @elseif ($report->notification->event_type === 1)
                            Incidente
                        @elseif ($report->notification->event_type === 2)
                            Evento Adverso
                        @else
                            Evento Centinela
                        @endif
                    </td>
                    <td>
                        @if($report->status===0)
                            Entregado
                        @else
                            Finalizado
                        @endif
                    </td>
                    <td>{{$report->user->name}}</td>
                    <td><a href="{{route('reports.showReport',$report)}}" class="btn btn-primary">Informe</a>
                    <p></p>
                    @if($report->status==1)
                    <a href="{{route('reports.pdf',$report)}}" class="btn btn-primary">Descargar</a>
                    @endif

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection