@extends('layout')

@section('title','Datos del evento')

@section('title card','Datos del evento')

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
<form method="POST" action="{{ url('notificacion/') }}" >
    {{ csrf_field() }}
    <div class="row">
        <div class="col-6">
            <input type="hidden" name="id_patient_datas" value="{{$id_patient_datas}}">
            <label for="event_date" >Fecha del Evento</label>
            <div class="input-group">

                <input type="text" class="form-control datepicker" name="event_date" value="{{ old('event_date') }}">
                <div class="input-group-addon">
                    <span class="glyphicon glyphicon-th"></span>
                </div>
            </div>

            <label for="event_time" >Hora del Evento</label>
            <div class="input-group">
                <input type="time" name="event_time" value="12:00" step="5">
            </div>

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
                    <option value=""> Escoja detalles</option>

                </select>
                <input type="text" class="form-control" name="detail_text" id="detail_text" disabled value="{{ old('detail_text') }}" placeholder="Indicar detalle">

            </div>

        </div>

        <div class="col-6">
            <label for="place_id" >Lugar o Servicio</label>
            <div class="form-group">
                <select class="form-control" name="place_id">
                    <option value> Escoja el servicio</option>
                    @foreach($places as $place)
                        <option  value = "{{$place->id }}">  {{$place->place}}</option>
                    @endforeach
                </select>
            </div>
            <label for="description">Observaciones</label>
            <div class="form-group">
                <textarea class="form-control" name="description" id="description" rows="3"></textarea>
            </div>
            <label>Existencia de medidas de prevencion</label>
            <div class="form-group">
                <label class="radio-inline">
                    <input type="radio" name="prevention_measures" id="si" value="si"> si
                </label>
                <label class="radio-inline">
                    <input type="radio" name="prevention_measures" id="no" value="no"> no
                </label>
                <label class="radio-inline">
                    <input type="radio" name="prevention_measures" id="se desconoce" value="se desconoce"> se desconoce
                </label>

            </div>

            <label for="measures_taken">Medidas Adoptadas</label>
            <div class="form-group">
                <textarea class="form-control" name="measures_taken" id="measures_taken" rows="3"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Enviar</button>

        </div>

    </div>




</form>



<script src="/js/notification/event.js"></script>
<script>
    $('.datepicker').datepicker({
        endDate: "today",
        language: "es",
        orientation: "bottom auto",
        autoclose: true
    });

</script>


@endsection

