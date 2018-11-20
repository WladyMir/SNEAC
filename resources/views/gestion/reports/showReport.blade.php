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
                            @if($report->status===0)
                                <label class="custom-control custom-radio">
                                    <input type="radio" name="status"  value=0 checked> Entregado
                                </label>
                            @else
                                <label class="custom-control custom-radio">
                                    <input type="radio" name="status"  value=0> Entregado
                                </label>
                            @endif
                            @if($report->status===1)
                                <label class="custom-control custom-radio">
                                    <input type="radio" name="status"  value=1 checked> Finalizado
                                </label>
                            @else
                                <label class="custom-control custom-radio">
                                    <input type="radio" name="status"  value=1> Finalizado
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