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

@section('title card','Detalles')

@section('content')

    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('gestion.showNotification',$notification) }}">Detalles</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('gestion.clasification',$notification)}}">Clasificacion</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="{{route('gestion.causes',$notification)}}">Causas</a>
        </li>

    </ul>
    <form method="POST" action="{{ url("/gestion/notificaciones/{$notification->id}/causa") }}">
        {{ method_field('PUT') }}
        {{ csrf_field() }}
        <div class="row">
            <div class="col-6">
                <label for="origin_id" >Origen</label>
                <div class="form-group">
                    <select class="form-control" name="origin_id" id="select_origin" >
                        <option value> Escoja origen de las causas</option>
                        @foreach($origins as $origin)
                            <option  value = "{{$origin->id }}">  {{$origin->origin}}</option>
                        @endforeach
                    </select>
                </div>
                <label for="contributory_factors" >Factores contribuyentes</label>
                <div class="form-group">
                    <select class="form-control" name="contributory_factor_id" id="select_contributory_factor" >
                        <option value> Escoja factor contribuyente</option>
                    </select>
                </div>


            </div>
            <div class="col-6">
                cause
            </div>
        </div>
    </form>
<script src="/js/gestion/causes.js"></script>
@endsection