@extends('layout')

@section('title','Plan de Mejora')

@section('menu')
    @include('includes.menu',['c'=>$count,
     'quantityReports'=>$quantityReports,
     'quantityAllReports'=>$quantityAllReports,
     'quantityImpPlans'=>$quantityImpPlans,
     'quantityAllImpPlans'=>$quantityAllImpPlans,
     ])
@endsection

@section('title card','Actividad de Plan de Mejora')

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
    <form method="POST" id="addActivity" action="{{ url("/gestion/planMejora/{$activity->id}/agregarActividad") }}" >
        {{ method_field('PUT') }}
        {{ csrf_field() }}
        <div class="card">
            <div class="card-body">
                <div class="form-group row">
                    <label for="activity" class="col-sm-3 col-form-label"><strong>ACTIVIDAD:</strong>(tareas para cada una de ellas)</label>

                    <div class="col-sm-9">
                        <textarea class="form-control" id="activity" name="activity" rows="4"></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="form-group row">
                    <label for="addResponsable" class="col-sm-3 col-form-label"><strong>RESPONSABLE:</strong></label>

                    <div class="col-sm-9">
                        <select class="form-control" name="addResponsable" id="addResponsable" >
                            <option value>Asigne al o los responsables de la actividad</option>
                            @foreach($users as $user)
                                <option  value = "{{$user->id }}"> {{$user->labor}} {{$user->name}}</option>
                            @endforeach

                        </select>
                        <p></p>
                        <input type="text" class="form-control" name="labor" id="labor" placeholder="Ej: Jefe de la unidad" value="">
                        <input type="hidden" name="activity_id" id="activity_id" value="{{$activity->id}}">
                        <input type="hidden" name="improvement_plan_id" id="improvement_plan_id" value="{{$activity->improvement_plan_id}}">
                    </div>
                    <div class="col-sm-3">

                    </div>
                    <div class="col-sm-9">
                        <p></p>
                        <button class="btn btn-primary add-res" id="btnAddRes">Agregar</button>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-5">
                    </div>
                    <div class="col-sm-5">
                        <p></p>
                        <ul class="list-group" id="listResponsables">
                            @if(count($responsables)===0)
                                <li>No se han agregado responsables</li>
                            @else
                                @foreach($responsables as $responsable)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">{{$responsable->user->name}}
                                        <button class="btn btn-danger btn-xs btn-delete delete-res" value="{{ $responsable['id'] }}"><span class="oi oi-x"></span></button>

                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="form-group row">
                    <label for="date" class="col-sm-3 col-form-label"><strong>FECHA:</strong></label>

                    <div class="col-sm-4">
                        <input type="text" class="form-control datepicker" name="date" id="date" value="">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-th"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="form-group row">
                    <label for="indicator" class="col-sm-3 col-form-label"><strong>VERIFICABLE O INDICADOR:</strong></label>

                    <div class="col-sm-9">
                        <input type="text" class="form-control"  name="indicator" id="indicator" value="">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="date_indicator" class="col-sm-3 col-form-label"><strong>FECHA: </strong></label>

                    <div class="col-sm-4">
                        <input type="text" class="form-control datepickerM" name="date_indicator" id="date_indicator" value="">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-th"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="form-group row">
                    <label for="responsible_monitoring" class="col-sm-3 col-form-label"><strong>RESPONSABLE MONITOREO:</strong></label>

                    <div class="col-sm-9">
                        <select class="form-control" name="addResponsableMon" id="addResponsableMon" >
                            <option value>Asigne al o los responsables de monitorear la actividad</option>
                            @foreach($users as $user)
                                <option  value = "{{$user->id }}"> {{$user->labor}} {{$user->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-3">
                    </div>
                    <div class="col-sm-9">
                        <button class="btn btn-primary add-resM" id="btnAddResMon">Agregar</button>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-3">
                    </div>
                    <div class="col-sm-9">
                        <p></p>
                        <ul class="list-group" id="listResponsablesMon">
                            @if(count($monitoringResponsables)===0)
                                <li>No se han agregado responsables</li>
                            @else
                                @foreach($monitoringResponsables as $monitoringResponsable)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">{{$monitoringResponsable->user->name}}
                                        <button class="btn btn-danger btn-xs btn-delete delete-resM" value="{{ $monitoringResponsable['id'] }}"><span class="oi oi-x"></span></button>

                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="detail_monitors" class="col-sm-3 col-form-label"><strong>DETALLES DEL O LOS RESPONSABLES DEL MONITOREO:</strong></label>

                    <div class="col-sm-9">
                        <input type="text" class="form-control"  name="detail_monitors" id="detail_monitors" value="">
                    </div>
                </div>


                <div class="form-group row">
                    <label for="date_monitoring" class="col-sm-3 col-form-label"><strong>FECHA MONITOREO:</strong></label>

                    <div class="col-sm-9">
                        <input type="text" class="form-control datepickerM" name="date_monitoring" id="date_monitoring" value="">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-th"></span>
                        </div>
                        <input type="hidden" class="form-control"  name="improvement_plan_id" id="improvement_plan_id" value="{{$improvementPlan->id}}">

                    </div>
                </div>

            </div>
        </div>

        <button type="submit" class="btn btn-primary" id="btnAddActivity">Agregar Actividad</button>
    </form>
    </div>


    <script type="text/javascript">
        $('.datepicker').datepicker({
            endDate: "today",
            language: "es",
            orientation: "bottom auto",
            autoclose: true
        });
        $('.datepickerM').datepicker({
            endDate: "",
            language: "es",
            orientation: "bottom auto",
            autoclose: true
        });
        $(document).on("click",".delete-res",function(event){
            event.preventDefault();
            var id =  $(this).val();
            console.log(id);
            $.ajax({
                url: "/responsable/"+id,
                type: "DELETE",
                data: {_method: 'delete', _token: '{{csrf_token()}}'},
                success: function (data) {
                    //console.log(data.activity_id);
                    alert(data.success);
                    $.get("/api/improvementPlan/activity/"+data.activity_id+"/responsable", function (data) {

                        if(data.length>0) {
                            $('#addResponsable').val('');
                            $('#labor').val('');
                            var htmlListParticipant = '';

                            for (var i = 0; i < data.length; i++) {
                                htmlListParticipant += '<li class="list-group-item d-flex justify-content-between align-items-center">'+data[i].user.labor +' '+ data[i].user.name+ ' '+
                                    ' ' +data[i].position+
                                    '<button class="btn btn-danger btn-xs btn-delete delete-res" value="'+ data[i].id + '"><span class="oi oi-x"></span></button></li>';
                            }
                            $('#listResponsables').html(htmlListParticipant);
                        }
                        else {
                            $('#listResponsables').html('<li>No se han agregado participantes </li>');
                        }
                    });
                },
                error:function () {
                    alert('No se ha eliminado el participante')
                }
            });

        });

        $(document).on("click",".delete-resM",function(event){
            event.preventDefault();
            var id =  $(this).val();
            console.log(id);
            $.ajax({
                url: "/responsable/monitoring/"+id,
                type: "DELETE",
                data: {_method: 'delete', _token: '{{csrf_token()}}'},
                success: function (data) {
                    console.log(data.activity_id);
                    alert(data.success);
                    $.get("/api/improvementPlan/activity/"+data.activity_id+"/responsableMonitoring", function (data) {

                        if(data.length>0) {
                            $('#addResponsableMon').val('');
                            var htmlListParticipant = '';

                            for (var i = 0; i < data.length; i++) {
                                htmlListParticipant += '<li class="list-group-item d-flex justify-content-between align-items-center">'+data[i].user.labor+' '+ data[i].user.name+
                                    '<button class="btn btn-danger btn-xs btn-delete delete-resM" value="' + data[i].id + '"><span class="oi oi-x"></span></button></li>';
                            }
                            $('#listResponsablesMon').html(htmlListParticipant);
                        }
                        else {
                            $('#listResponsablesMon').html('<li>No se han agregado participantes </li>');
                        }
                    });

                },
                error:function () {
                    alert('error, no se ha eliminado el responsable del monitereo')
                }
            });

        });


        $(document).on("click",".add-resM",function(event){
            event.preventDefault();
            $.ajax({
                url: "/gestion/planMejora/agregarResponsableMonitoreo",
                method: "POST",
                data: {_method: 'post',
                    _token: '{{csrf_token()}}',
                    user_id:$('#addResponsableMon').val(),
                    activity_id:$('#activity_id').val(),
                    improvement_plan_id:$('#improvement_plan_id').val(),},
                dataType: "json",
                success: function (data) {
                    console.log(data.activity_id);
                    alert(data.success);
                    $.get("/api/improvementPlan/activity/"+data.activity_id+"/responsableMonitoring", function (data) {

                        if(data.length>0) {
                            $('#addResponsableMon').val('');
                            var htmlListParticipant = '';

                            for (var i = 0; i < data.length; i++) {
                                htmlListParticipant += '<li class="list-group-item d-flex justify-content-between align-items-center">'+data[i].user.labor+' '+ data[i].user.name+
                                    '<button class="btn btn-danger btn-xs btn-delete delete-resM" value="' + data[i].id + '"><span class="oi oi-x"></span></button></li>';
                            }
                            $('#listResponsablesMon').html(htmlListParticipant);
                        }
                        else {
                            $('#listResponsablesMon').html('<li>No se han agregado participantes </li>');
                        }
                    });

                },
                error:function () {
                    alert('error, llene los campos solicitados')
                }
            });
        });




        $(document).on("click",".add-res",function(event){
            event.preventDefault();
            $.ajax({
                url: "/gestion/planMejora/agregarResponsable",
                method: "POST",
                data: {_method: 'post',
                    _token: '{{csrf_token()}}',
                    user_id:$('#addResponsable').val(),
                    labor:$('#labor').val(),
                    improvement_plan_id:$('#improvement_plan_id').val(),
                    activity_id:$('#activity_id').val()},
                dataType: "json",
                success: function (data) {
                    console.log(data.activity_id);
                    alert(data.success);
                    $.get("/api/improvementPlan/activity/"+data.activity_id+"/responsable", function (data) {

                        if(data.length>0) {
                            $('#addResponsable').val('');
                            $('#labor').val('');
                            var htmlListParticipant = '';

                            for (var i = 0; i < data.length; i++) {
                                htmlListParticipant += '<li class="list-group-item d-flex justify-content-between align-items-center">'+data[i].user.labor+' '+ data[i].user.name+ ' ' +
                                    ' ' +data[i].position+
                                    '<button class="btn btn-danger btn-xs btn-delete delete-res" value="' + data[i].id + '"><span class="oi oi-x"></span></button></li>';
                            }
                            $('#listResponsables').html(htmlListParticipant);
                        }
                        else {
                            $('#listResponsables').html('<li>No se han agregado participantes </li>');
                        }
                    });

                },
                error:function () {
                    alert('error, llene los campos solicitados')
                }
            });
        });
    </script>
@endsection