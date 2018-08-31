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

@section('title card','Detalles del Informe')

@section('content')

    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" href="{{ route('reports.showReport',$report) }}">Detalles</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('reports.makeReport',$report) }}">Informe</a>
        </li>


    </ul>
    <p></p>
    <div class="form-group row">
        <div class="col-sm-6">
            <div class="bs-component">
                <h4><strong>Asignación de Informe</strong></h4>
                <p></p>
                {{$report->message}}
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header">
                    Estado del Informe
                </div>
                <div class="card-body">
                    <form method="POST" id="addDates" action="{{ url("gestion/informe/{$report->id}/actualizarEstado") }}" >
                        {{ method_field('PUT') }}
                        {{ csrf_field() }}
                        <div class="form-group">
                            <h4>Estado del evento</h4>
                            @if($report->status==='Entregado')
                                <label class="custom-control custom-radio">
                                    <input type="radio" name="status"  value="Entregado" checked> Entregado
                                </label>
                            @else
                                <label class="custom-control custom-radio">
                                    <input type="radio" name="status"  value="Entregado"> Entregado
                                </label>
                            @endif
                            @if($report->status==='Finalizado')
                                <label class="custom-control custom-radio">
                                    <input type="radio" name="status"  value="Finalizado" checked> Finalizado
                                </label>
                            @else
                                <label class="custom-control custom-radio">
                                    <input type="radio" name="status"  value="Finalizado"> Finalizado
                                </label>
                            @endif

                        </div>
                        <button type="submit" class="btn btn-primary" id="btnAdd">Actualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection