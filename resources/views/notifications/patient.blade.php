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

<form method="POST" action="{{ url('notificacion/evento') }}" >
    {{ csrf_field() }}
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="name_patient">Nombre</label>
                <input type="text" class="form-control" name="name_patient" id="name_patient" placeholder="Pedro Perez" value="{{ old('name_patient') }}">
            </div>

            <label for="admission_date" >Fecha de Ingreso</label>
            <div class="input-group">

                <input type="text" class="form-control datepicker" name="admission_date" value="{{ old('admission_date') }}">
                <div class="input-group-addon">
                    <span class="glyphicon glyphicon-th"></span>
                </div>
            </div>

            <div class="form-group">
                <label for="rut">Rut</label>
                <input type="text" class="form-control" name="rut" id="rut" placeholder="12.345.678-9" value="{{ old('rut') }}">
            </div>



            <label>Sexo</label>
            <div class="form-group">
                <label class="radio-inline">
                    <input type="radio" name="gender" id="sexoM" value="masculino"> masculino
                </label>
                <label class="radio-inline">
                    <input type="radio" name="gender" id="sexoF" value="femenino"> femenino
                </label>

            </div>
            <label>Clasificación del Paciente</label>
            <div class="form-group">
                <label class="radio-inline">
                    <input type="radio" name="patient_classification" id="adulto" value="adulto"> adulto
                </label>
                <label class="radio-inline">
                    <input type="radio" name="patient_classification" id="neonato" value="neonato"> neonato
                </label>
                <label class="radio-inline">
                    <input type="radio" name="patient_classification" id="pediatrico" value="pediatrico"> pediatrico
                </label>

            </div>
            <label>Tipo de Paciente</label>
            <div class="form-group">
                <label class="radio-inline">
                    <input type="radio" name="patient_type" id="ambulatorio" value="ambulatorio" onclick="habilitaDeshabilita(this.form)"> ambulatorio
                    <div class="form-group">
                        <select class="form-control" name="place_id"  disabled >
                            <option value> Escoja el servicio</option>
                            @foreach($places as $place)
                                <option  value = "{{$place->id }}">  {{$place->place}}</option>
                            @endforeach
                        </select>
                    </div>
                </label>
                <label class="radio-inline">
                    <input type="radio" name="patient_type" id="hospitalizado" value="hospitalizado" onclick="habilitaDeshabilita(this.form)"> hospitalizado
                    <input type="text" class="form-control" name="bed" id="bed" disabled value="{{ old('bed') }}" placeholder="Indique cama">
                </label>

            </div>



        </div>


        <div class="col-6">
            <div class="form-group">
                <label for="observation">Observaciones (diagnóstico)</label>
                <textarea class="form-control" name="observation" id="observation" rows="3"></textarea>
            </div>
            <div class="form-group">
                <h2>Consecuencias</h2>
                @foreach($consequences as $consequence)
                    <label class="custom-control custom-radio">
                        <input type="radio" name="consequence_id" id="{{$consequence->id}}" value="{{$consequence->id}}"> {{$consequence->consequence}}
                    </label>
                @endforeach
            </div>
            <button type="submit" class="btn btn-primary">Siguiente</button>




        </div>

    </div>


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
<script type="text/javascript">
    function habilitaDeshabilita(form)
    {
        if (form.patient_type.value === "ambulatorio")
        {
            form.place_id.disabled = false;
            form.bed.disabled = true;
        }
        if(form.patient_type.value === "hospitalizado")
        {
            form.bed.disabled = false;
            form.place_id.disabled = true;
        }

    }
</script>



@endsection

