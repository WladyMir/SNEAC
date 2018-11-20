@extends('layout')

@section('title','Datos del paciente')

@section('title card','Datos del paciente')

@section('content')

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

<form method="POST" action="{{ url('notificacion/nueva') }}" >
    {{ csrf_field() }}
    <div class="row">
        <label class="col-3" for="name_patient"><strong>NOMBRE DEL PACIENTE:</strong></label>
        <input type="text" class="form-control col-9" name="name_patient" id="name_patient" placeholder="Ej: Pedro Perez" value="{{ old('name_patient') }}">
    </div>
    <p></p>
    <div class="row">
        <label class="col-3" for="rut"><strong>RUT:</strong></label>
        <input type="text" class="form-control col-3" name="rut" id="rut" placeholder="Ej: 11.111.111-1" value="{{ old('rut') }}">

        <label class="col-2" for="age"><strong>EDAD:</strong></label>
        <input type="text" class="form-control col-4" name="age" id="age" placeholder="Ej: 21" value="{{ old('age') }}">
    </div>
    <p></p>
    <div class="row">
        <label class="col-3" for="diagnostic"><strong>DIAGNÓSTICO:</strong></label>
        <input type="text" class="form-control col-9" name="diagnostic" id="diagnostic" placeholder="" value="{{ old('diagnostic') }}">
    </div>
    <p></p>
    <div class="row">
        <label class="col-3" for="event_date"><strong>FECHA DE EVENTO:</strong></label>
        <input type="text" class="form-control datepicker col-3" name="event_date" value="{{ old('event_date') }}">
        <div class="input-group-addon">
            <span class="glyphicon glyphicon-th"></span>
        </div>

        <label class="col-2" for="event_time" ><strong>HORA DEL EVENTO: </strong></label>
        <div class="input-group col-4">
            <input type="time" name="event_time" value="12:00" step="5">
        </div>
    </div>
    <p></p>
    <div class="row">
        <label class="col-3" for="occurrence_place_id" ><strong>SERVICIO/UNIDAD DE OCURRENCIA</strong></label>
        <select class="form-control col-9" name="occurrence_place_id">
            <option value> Escoja el servicio</option>
            @foreach($places as $place)
                <option  value = "{{$place->id }}">  {{$place->place}}</option>
            @endforeach
        </select>
    </div>
    <p></p>
    <div class="row">
        <label class="col-3" for="notifier_name"><strong>IDENTIFICACIÓN DE QUIEN NOTIFICA: (OPTATIVO)</strong></label>
        <input type="text" class="form-control col-9" name="notifier_name" id="notifier_name" placeholder="Ej: Pedro Perez" value="{{ old('notifier_name') }}">
    </div>
    <p></p>
    <div class="row">
        <label class="col-3" for="notifier_place_id" ><strong>SERVICIO/UNIDAD QUE NOTIFICA:</strong></label>
        <select class="form-control col-9" name="notifier_place_id">
            <option value> Escoja el servicio</option>
            @foreach($places as $place)
                <option  value = "{{$place->id }}">  {{$place->place}}</option>
            @endforeach
        </select>
    </div>
    <p></p>
    <div class="row">
        <label class="col-3" for="description"><strong>DESCRIPCIÓN DEL EVENTO: (PRECISA Y DETALLADA)</strong></label>
        <textarea class="form-control col-9" name="description" id="description" rows="4"></textarea>
    </div>
    <p></p>
    <div class="row">
        <label class="col-3" for="event_consequence"><strong>CONSECUENCIA DEL EVENTO:</strong></label>
        <div class="col-3">
            <input type="radio" name="event_consequence" id="0" value="0"> <strong>SIN LESIÓN</strong><p></p>
            <input type="radio" name="event_consequence" id="1" value="1"> <strong>LESIÓN LEVE</strong><p></p>
            <input type="radio" name="event_consequence" id="2" value="2"> <strong>LESIÓN MODERADA</strong><p></p>
            <input type="radio" name="event_consequence" id="3" value="3"> <strong>LESIÓN GRAVE</strong><p></p>
            <input type="radio" name="event_consequence" id="4" value="4"> <strong>MUERTE</strong><p></p>
        </div>
        <label class="col-3" for="clinical_record"><strong>LOS HECHOS FUERON REGISTRADOS EN LA FICHA CLÍNICA DEL USUARIO:</strong></label>
        <div class="col-3">
            <input type="radio" name="clinical_record" id="sexoM" value="0"> <strong>SI</strong><p></p>
            <input type="radio" name="clinical_record" id="sexoM" value="1"> <strong>NO</strong><p></p>
            <input type="radio" name="clinical_record" id="sexoM" value="2"> <strong>SE DESCONOCE</strong<p></p>

        </div>

    </div>
    <p></p>
    <button type="submit" class="btn btn-primary"><strong>ENVIAR NOTIFICACIÓN</strong></button>

</form>
<script src="/js/rut/formatRut.js"></script>

<script>
    $('.datepicker').datepicker({
        endDate: "today",
        language: "es",
        orientation: "bottom auto",
        autoclose: true
    });

</script>




@endsection

