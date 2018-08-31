@extends('layout')

@section('title','Clasificacion y Causas')

@section('menu')
    @include('includes.menu',['c'=>$count,
    'quantityReports'=>$quantityReports,
    'quantityAllReports'=>$quantityAllReports,
    'quantityImpPlans'=>$quantityImpPlans,
    'quantityAllImpPlans'=>$quantityAllImpPlans,
    ])
@endsection

@section('title card','Clasificacion y Causas')

@section('content')
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('gestion.showNotification',$notification) }}">Detalles</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="{{route('gestion.clasification',$notification)}}">Clasificacion</a>
        </li>
    </ul>

        <div class="row">
            <div class="col-6">
                <form method="POST" action="{{ url("/gestion/notificaciones/{$notification->id}/clasificacion") }}">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}
                <div class="form-group">
                    <h4>Tipo de Evento</h4>
                    @if($notification->event_type==='Sin clasificar')
                        <label class="custom-control custom-radio">
                            <input type="radio" name="event_type"  value="Sin clasificar" checked> Sin clasificar
                        </label>
                    @else
                        <label class="custom-control custom-radio">
                            <input type="radio" name="event_type"  value="Sin clasificar"> Sin clasificar
                        </label>
                    @endif
                    @if($notification->event_type==='Incidente')
                        <label class="custom-control custom-radio">
                            <input type="radio" name="event_type"  value="Incidente" checked> Incidente
                        </label>
                    @else
                        <label class="custom-control custom-radio">
                            <input type="radio" name="event_type"  value="Incidente"> Incidente
                        </label>
                    @endif
                    @if($notification->event_type==='Evento adverso')
                        <label class="custom-control custom-radio">
                            <input type="radio" name="event_type"  value="Evento adverso" checked> Evento Adverso
                        </label>
                    @else
                        <label class="custom-control custom-radio">
                            <input type="radio" name="event_type"  value="Evento adverso"> Evento Adverso
                        </label>
                    @endif
                    @if($notification->event_type==='Evento centinela')
                        <label class="custom-control custom-radio">
                            <input type="radio" name="event_type"  value="Evento centinela" checked> Evento Centinela
                        </label>
                    @else
                        <label class="custom-control custom-radio">
                            <input type="radio" name="event_type"  value="Evento centinela"> Evento Centinela
                        </label>
                    @endif
                </div>
                <div class="form-group">
                    <h4>Estado del evento</h4>
                    @if($notification->event_status==='Pendiente')
                        <label class="custom-control custom-radio">
                            <input type="radio" name="event_status"  value="Pendiente" checked> Pendiente
                        </label>
                    @else
                        <label class="custom-control custom-radio">
                            <input type="radio" name="event_status"  value="Pendiente"> Pendiente
                        </label>
                    @endif
                    @if($notification->event_status==='Realizando Análisis')
                        <label class="custom-control custom-radio">
                            <input type="radio" name="event_status"  value="Realizando Análisis" checked> Realizando Análisis
                        </label>
                    @else
                        <label class="custom-control custom-radio">
                            <input type="radio" name="event_status"  value="Realizando Análisis"> Realizando Análisis
                        </label>
                    @endif
                    @if($notification->event_status==='Informe')
                        <label class="custom-control custom-radio">
                            <input type="radio" name="event_status"  value="Informe" checked> Informe
                        </label>
                    @else
                        <label class="custom-control custom-radio">
                            <input type="radio" name="event_status"  value="Informe"> Informe
                        </label>
                    @endif
                    @if($notification->event_status==='En plan de mejora')
                        <label class="custom-control custom-radio">
                            <input type="radio" name="event_status"  value="En plan de mejora" checked> En plan de mejora
                        </label>
                    @else
                        <label class="custom-control custom-radio">
                            <input type="radio" name="event_status"  value="En plan de mejora"> En plan de mejora
                        </label>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Actualizar datos</button>
            </form>
            </div>
            <div class="col-6">
                @if($notification->event_status==='Informe'&&$notification->event_type!=='Sin clasificar')
                    <form method="POST" action="{{ url("/gestion/notificaciones") }}">
                        {{ csrf_field() }}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <h6>Por favor corrige los siguiente errores:</h6>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="form-group">
                            <h4>Asignar Informe</h4>
                            <div class="form-group">
                                <select class="form-control" name="user_id" id="user_id" >
                                    <option value>Asigne a quien realizará el informe</option>
                                    @foreach($users as $user)
                                        <option  value = "{{$user->id }}">  {{$user->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                        <textarea class="form-control" id="message" name="message" rows="4">Se te ha asignado la realización del informe correspondiente al evento ocurrido el {{$event_date}} al paciente {{$name_patient}}, en el lugar o servicio de {{$place}}
                        </textarea>
                        <input type="hidden" name="notification_id" value="{{$notification->id}}">
                        <button type="submit" class="btn btn-primary">Asignar Informe</button>
                    </form>
                @endif


            </div>
        </div>


@endsection