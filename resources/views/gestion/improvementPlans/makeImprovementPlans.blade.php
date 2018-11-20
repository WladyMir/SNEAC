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

@section('title card','Plan de Mejora')

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
    <form  id="improvementPlanForm" method="POST" action="{{ url("gestion/planMejora/{$improvementPlan->id}/actualizar") }}" >
        {{ method_field('PUT') }}
        {{ csrf_field() }}
        <div class="card">
            <div class="card-body">
                <div class="form-group row">
                    <label for="objective" class="col-sm-2 col-form-label"><strong>OBJETIVO:</strong></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control"  name="objective" id="objective" value="{{ $improvementPlan->objective}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="scope" class="col-sm-2 col-form-label"><strong>META:</strong></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control"  name="scope" id="scope" value="{{ $improvementPlan->scope}}">

                    </div>
                    <div class="col-sm-2">
                        <button type="submit" class="btn btn-primary" id="storeImpPlan">Guardar</button>
                    </div>
                </div>


            </div>
        </div>
    </form>
    <p></p>
    <a href="{{route('improvementPlans.addActivityAux',$improvementPlan)}}" class="btn btn-primary">Agregar Actividad</a>

    <div class="form-group row">
        <div class="col-sm-12">

            <p></p>

            @if(count($activitiesImprovementPlans)===0)
                <table class="table table-hover" id="tableActImpPln"></table>
                <label>No se han agregado actividades</label>
            @else
                <table class="table table-hover" id="tableActImpPln">
                    <thead>
                    <tr>
                        <th scope="col">ACTIVIDADES</th>
                        <th scope="col">RESPONSABLE</th>
                        <th scope="col">FECHA</th>
                        <th scope="col">VERIFICABLE O INDICADOR</th>
                        <th scope="col">REPONSABLE DE MONITOREO</th>
                        <th scope="col">FECHA MONITOREO</th>
                        <th scope="col"> </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($activitiesImprovementPlans as $activitiesImprovementPlan)

                        <tr class="table-active">

                            <th scope="row">{{$activitiesImprovementPlan->activity}}</th>

                            <td>@foreach($activityResponsables as $activityResponsable)
                                    @if($activityResponsable->activity_id==$activitiesImprovementPlan->id)
                                        {{$activityResponsable->labor}} {{$activityResponsable->name}} {{$activityResponsable->position}}<br />
                                    @endif
                                @endforeach
                            </td>
                            <td>{{$activitiesImprovementPlan->date}}</td>
                            <td>{{$activitiesImprovementPlan->indicator}}<br /> {{$activitiesImprovementPlan->date_indicator}}</td>
                            <td>@foreach($monitoringResponsables as $monitoringResponsable)
                                    @if($monitoringResponsable->activity_id==$activitiesImprovementPlan->id)
                                        {{$monitoringResponsable->position}} {{$monitoringResponsable->name}},<br />
                                    @endif
                                @endforeach
                                : {{$activitiesImprovementPlan->detail_monitors}}
                            </td>
                            <td>{{$activitiesImprovementPlan->date_monitoring}}</td>

                            <td>
                                <a href="{{route('improvementPlans.activityEdit',$activitiesImprovementPlan)}}" class="btn btn-link"><span class="oi oi-pencil"></span></a>
                                <button class="btn btn-danger btn-xs btn-delete delete-actImpPln" value="{{ $activitiesImprovementPlan['id'] }}"><span class="oi oi-trash"></span></button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
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
        $(document).on("click",".delete-actImpPln",function(){
            var id =  $(this).val();
            $.ajax({
                url: "/activity/"+id,
                type: "DELETE",
                data: {_method: 'delete', _token: '{{csrf_token()}}'},
                success: function (data) {
                    console.log(data);
                    //alert(data.success);
                    $.get("/api/improvementPlan/"+data.improvement_plan_id+"/activities", function (data) {
                        if(data.length>0){
                            var htmlTable = '<table class="table table-hover" id="tableFacCon">'+
                                '<thead>'+
                                '<tr>'+
                                '<th scope="col">ACTIVIDADES</th>'+
                                '<th scope="col">RESPONSABLE</th>'+
                                '<th scope="col">FECHA</th>'+
                                '<th scope="col">VERIFICABLE O INDICADOR</th>'+
                                '<th scope="col">REPONSABLE DE MONITOREO</th>'+
                                '<th scope="col">FECHA MONITOREO</th>'+
                                '<th scope="col"> </th>'+
                                '</tr>'+
                                '</thead>'+
                                '<tbody>';

                            for(var i=0; i<data.length; i++){
                                htmlTable+='<tr class="table-active">' +
                                    '<th scope="row">'+data[i].activity+'</th>' +
                                    '<td>'+data[i].responsable+'</td>' +
                                    '<td>'+data[i].date+'</td>' +
                                    '<td>'+data[i].indicator+'</td>' +
                                    '<td>'+data[i].responsible_monitoring+'</td>' +
                                    '<td>'+data[i].date_monitoring+'</td>' +
                                    '<td><button class="btn btn-danger btn-xs btn-delete delete-actImpPln" value="'+data[i].id+'"><span class="oi oi-x"></span></button></td>' +
                                    '</tr></tbody>';

                            }
                            $('#tableActImpPln').html(htmlTable);
                        }
                        else {
                            $('#tableActImpPln').html('<label>No se han agregado Actividades</label>');
                        }
                    });
                },
                error:function () {
                    alert('No se ha eliminado la actividad');
                }
            });

        });
        $('#addActivity').on('submit', function (event) {
            event.preventDefault();
            var form_data = $(this).serialize();
            //$('#situation').val('');
            console.log(form_data);
            $.ajax({
                url: "/gestion/planMejora/agregarActividad",
                method: "POST",
                data: form_data,
                dataType: "json",
                success: function (data) {
                    console.log(data.success);
                    //alert(data.success);
                    $.get("/api/improvementPlan/"+data.improvement_plan_id+"/activities", function (data) {
                        if(data.length>0){
                            var htmlTable = '<table class="table table-hover" id="tableActImpPln">'+
                                '<thead>'+
                                '<tr>'+
                                    '<th scope="col">ACTIVIDADES</th>'+
                                    '<th scope="col">RESPONSABLE</th>'+
                                    '<th scope="col">FECHA</th>'+
                                    '<th scope="col">VERIFICABLE O INDICADOR</th>'+
                                    '<th scope="col">REPONSABLE DE MONITOREO</th>'+
                                    '<th scope="col">FECHA MONITOREO</th>'+
                                    '<th scope="col"> </th>'+
                                '</tr>'+
                                '</thead>'+
                                '<tbody>';

                            for(var i=0; i<data.length; i++){
                                htmlTable+='<tr class="table-active">' +
                                    '<th scope="row">'+data[i].activity+'</th>' +
                                    '<td>'+data[i].responsable+'</td>' +
                                    '<td>'+data[i].date+'</td>' +
                                    '<td>'+data[i].indicator+'</td>' +
                                    '<td>'+data[i].responsible_monitoring+'</td>' +
                                    '<td>'+data[i].date_monitoring+'</td>' +
                                    '<td><button class="btn btn-danger btn-xs btn-delete delete-actImpPln" value="'+data[i].id+'"><span class="oi oi-x"></span></button></td>' +
                                    '</tr>';

                            }
                            htmlTable+='</tbody>';
                            $('#tableActImpPln').html(htmlTable);
                        }
                        else {
                            $('#tableActImpPln').html('<label>No se han agregado Actividades</label>');
                        }
                    });
//

                },
                error:function () {
                    alert('error')
                }
            });

        });

    </script>


@endsection