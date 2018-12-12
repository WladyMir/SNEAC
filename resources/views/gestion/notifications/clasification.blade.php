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
                    @if($notification->event_type===0)
                        <label class="custom-control custom-radio">
                            <input type="radio" name="event_type"  value=0 checked> Sin clasificar
                        </label>
                    @else
                        <label class="custom-control custom-radio">
                            <input type="radio" name="event_type"  value=0> Sin clasificar
                        </label>
                    @endif
                    @if($notification->event_type===1)
                        <label class="custom-control custom-radio">
                            <input type="radio" name="event_type"  value=1 checked> Incidente
                        </label>
                    @else
                        <label class="custom-control custom-radio">
                            <input type="radio" name="event_type"  value=1> Incidente
                        </label>
                    @endif
                    @if($notification->event_type===2)
                        <label class="custom-control custom-radio">
                            <input type="radio" name="event_type"  value=2 checked> Evento Adverso
                        </label>
                    @else
                        <label class="custom-control custom-radio">
                            <input type="radio" name="event_type"  value=2> Evento Adverso
                        </label>
                    @endif
                    @if($notification->event_type===3)
                        <label class="custom-control custom-radio">
                            <input type="radio" name="event_type"  value=3 checked> Evento Centinela
                        </label>
                    @else
                        <label class="custom-control custom-radio">
                            <input type="radio" name="event_type"  value=3> Evento Centinela
                        </label>
                    @endif
                </div>
                <div class="form-group">
                    <h4>Estado del evento</h4>
                    @if($notification->event_status===0)
                        <label class="custom-control custom-radio">
                            <input type="radio" name="event_status"  value=0 checked> Pendiente
                        </label>
                    @else
                        <label class="custom-control custom-radio">
                            <input type="radio" name="event_status"  value=0> Pendiente
                        </label>
                    @endif
                    @if($notification->event_status===1)
                        <label class="custom-control custom-radio">
                            <input type="radio" name="event_status"  value=1 checked> Realizando Análisis
                        </label>
                    @else
                        <label class="custom-control custom-radio">
                            <input type="radio" name="event_status"  value=1> Realizando Análisis
                        </label>
                    @endif
                    @if($notification->event_status===2)
                        <label class="custom-control custom-radio">
                            <input type="radio" name="event_status"  value=2 checked> Informe
                        </label>
                    @else
                        <label class="custom-control custom-radio">
                            <input type="radio" name="event_status"  value=2> Informe
                        </label>
                    @endif
                    @if($notification->event_status===3)
                        <label class="custom-control custom-radio">
                            <input type="radio" name="event_status"  value=3 checked> En plan de mejora
                        </label>
                    @else
                        <label class="custom-control custom-radio">
                            <input type="radio" name="event_status"  value=3> En plan de mejora
                        </label>
                    @endif

                    <label for="classification_id" >Clasificación</label>
                    <div class="form-group">
                        <select class="form-control" name="classification_id" id="select_classification" >
                            <option value> Escoja clasificación</option>
                            @foreach($classifications as $classification)
                                <option  value = "{{$classification->id }}">  {{$classification->name_classification}}</option>
                            @endforeach
                        </select>
                    </div>

                    <label for="event_name_id" >Nombre del evento</label>
                    <div class="form-group">
                        <select class="form-control" name="event_name_id" id="select_name_event" >
                            <option value> Escoja evento</option>
                        </select>
                    </div>

                    <label for="details_id" >Detalles</label>
                    <div class="form-group">
                        <select class="form-control" name="details_id" id="select_details" >
                            <option value> Escoja detalles</option>

                        </select>
                        <input type="text" class="form-control" name="detail_text" id="detail_text" disabled value="{{ old('detail_text') }}" placeholder="Indicar detalle">

                    </div>

                </div>
                <button type="submit" class="btn btn-primary">Actualizar datos</button>
            </form>
            </div>
            <div class="col-6">
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
                    <textarea class="form-control" id="message" name="message" rows="4">Se te ha asignado la realización del informe correspondiente al evento ocurrido el {{$notification->event_date}} al paciente {{$notification->name_patient}}, en el lugar o servicio de {{$notification->occurrencePlace->place}}
                    </textarea>
                    <p></p>
                    @if($report===null)
                        <div class="form-group">
                            <h4>No se ha asignado la realización del Informe</h4>
                        </div>
                    @else
                        <div class="form-group">
                            <h4>{{$report->user->name}} tiene asignada la realización del Informe</h4>
                        </div>
                    @endif
                    <input type="hidden" name="notification_id" value="{{$notification->id}}">
                    <p></p>
                    <button type="submit" class="btn btn-primary">Asignar Informe</button>
                </form>
            </div>
        </div>

    <script src="/js/notification/event.js"></script>
@endsection
