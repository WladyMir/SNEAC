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
            <a class="nav-link" href="{{ route('reports.showReport',$report) }}">Detalles</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="{{ route('reports.makeReport',$report) }}">Informe</a>
        </li>


    </ul>
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
    <form  id="reporForm" method="POST" action="{{ url("gestion/informe/{$report->id}/actualizar") }}" >
        {{ method_field('PUT') }}
        {{ csrf_field() }}
        <div class="card">
            <div class="card-body">
                <div class="form-group row">
                    <label for="service_boss" class="col-sm-4 col-form-label"><strong>JEFE DE SERVICIO O UNIDAD:</strong></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control"  name="service_boss" id="service_boss" placeholder="Pedro Perez" value="{{ $report->service_boss }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="supervisor" class="col-sm-4 col-form-label"><strong>PROFESIONAL SUPERVISOR:</strong></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control"  name="supervisor" id="supervisor" placeholder="Pedro Perez" value="{{$report->supervisor }}">
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="form-group row">
                    <label for="report_writer" class="col-sm-4 col-form-label"><strong>INFORME REALIZADO POR:</strong></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control"  name="report_writer" id="report_writer" placeholder="Pedro Perez" value="{{ $report_writer }}">
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="form-group row">
                    <label for="place" class="col-sm-5 col-form-label">Identificación del servicio o Unidad</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control"  name="place" id="place" value="{{ $place->place }}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="narration" class="col-sm-5 col-form-label">Problema (incidente, evento adverso o centinela).
                        Se debe narrar la situación ocurrida, cronológicamente, con enfasis en los <strong>nodos críticos</strong> del proceso</label>
                    <div class="col-sm-7">
                        <textarea class="form-control" id="narration" name="narration" rows="4">{{$report->narration}}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="date" class="col-sm-5 col-form-label">Fecha de ocurrencia</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control"  name="date" id="date" value="{{ $date_event}}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name_research_leader" class="col-sm-5 col-form-label">Nombre de líder de equipo de investigación</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control"  name="name_research_leader" id="name_research_leader" placeholder="Pedro Perez" value="{{$report->name_research_leader}}">
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">

                <div class="form-group row">
                    <label for="addParticipant" class="col-sm-5 col-form-label">Participantes de análisis y diseño de plan de mejora</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="addParticipant" id="addParticipant" placeholder="Pedro Perez" value="">
                        <input type="hidden" name="report_id" id="report_id" value="{{$report->id}}">
                    </div>
                    <div class="col-sm-2">

                        <button class="btn btn-primary add-part" id="btnAddPart">Agregar</button>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-5">
                    </div>
                    <div class="col-sm-5">
                        <p></p>
                        <ul class="list-group" id="listParticpants">
                            @if(count($participants)===0)
                                <li>No se han agregado participantes</li>
                            @else
                                @foreach($participants as $participant)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">{{$participant->name}}
                                        <button class="btn btn-danger btn-xs btn-delete delete-url" value="{{ $participant['id'] }}"><span class="oi oi-x"></span></button>

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
                        <label for="addDates" class="col-sm-5 col-form-label">Fechas de entrevistas, reuniones de análisis, revisión de registros clínicos, etc</label>
                        <div class="col-sm-7">
                            <label for="situation" >Situación</label>
                            <input type="text" class="form-control" name="situation" id="situation" placeholder="Ej: Entrevista" value="">
                            <input type="hidden" name="report_id" value="{{$report->id}}">
                            <label for="date_situation" >Fecha</label>
                            <div class="input-group">
                                <input type="text" class="form-control datepicker" name="date_situation" id="date_situation" value="">
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                </div>
                            </div>
                            <p></p>
                            <button class="btn btn-primary add-date" id="btnAddDate">Agregar</button>
                        </div>
                    </div>
                <div class="form-group row">
                    <div class="col-sm-5">
                    </div>
                    <div class="col-sm-7">
                        <p></p>
                        <ul class="list-group" id="listDates">
                            @if(count($report_dates)===0)
                                <li>No se han agregado fechas</li>
                            @else
                                @foreach($report_dates as $report_date)
                                    <li class="list-group-item d-flex justify-content-between align-items-center"><strong>{{$report_date->situation}}:</strong> {{$report_date->date_situation}}
                                        <button class="btn btn-danger btn-xs btn-delete delete-date" value="{{ $report_date['id'] }}"><span class="oi oi-x"></span></button>
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
                    <label for="planningAction" class="col-sm-5 col-form-label"><strong>Tipo de error:</strong> (especificar y desarrollar lo ocurrido).</label>
                    <div class="col-sm-7">
                        <h6><strong>Acción insegura:</strong></h6>
                        <input type="text" class="form-control"  name="type_error" id="type_error" value="{{ $unsafe_action->type_error}}">
                        <h6><strong>Errores por acción:</strong></h6>
                        <label for="planningAction" >Planeación</label>
                        <input type="text" class="form-control"  name="planningAction" id="planningAction" value="{{ $unsafe_action->planningAction}}">
                        <label for="executionAction" >Ejecución</label>
                        <input type="text" class="form-control"  name="executionAction" id="executionAction" value="{{ $unsafe_action->executionAction }}">

                        <h6><strong>Errores por omisión:</strong></h6>
                        <label for="planningOmission" >Planeación</label>
                        <input type="text" class="form-control"  name="planningOmission" id="planningOmission" value="{{ $unsafe_action->planningOmission }}">
                        <label for="executionOmission" >Ejecución</label>
                        <input type="text" class="form-control"  name="executionOmission" id="executionOmission" value="{{ $unsafe_action->executionOmission }}">
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                    <div class="form-group row">
                        <label for="select_origin" class="col-sm-5 col-form-label"><strong>Factores Contributivos:</strong> (especificar y desarrollar).</label>
                        <div class="col-sm-7">
                            <label for="origin" >Factores contribuyentes</label>
                            <div class="form-group">
                                <select class="form-control" name="origin_id" id="select_origin" >
                                    <option value> Escoja el factor</option>
                                    @foreach($origins as $origin)
                                        <option  value = "{{$origin->id }}">  {{$origin->origin}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <p></p>
                            <label for="details_contributory_factors" >Detalles</label>
                            <div class="form-group">
                                <input type="hidden" name="report_id" value="{{$report->id}}">
                                <input type="text" class="form-control" name="detail" id="details_contributory_factors" placeholder="" value="">
                            </div>
                            <p></p>
                            <button  class="btn btn-primary add-fc" id="btnAddConFac">Agregar</button>
                        </div>
                    </div>
                <div class="form-group row">
                    <div class="col-sm-5">
                    </div>
                    <div class="col-sm-7">
                        <p></p>

                        @if(count($contributory_factors)===0)
                            <table class="table table-hover" id="tableFacCon"></table>
                            <label>No se han agregado factores contributivos</label>
                        @else
                            <table class="table table-hover" id="tableFacCon">
                                <thead>
                                <tr>
                                    <th scope="col">Factor Contributivo</th>
                                    <th scope="col">Detalle</th>
                                    <th scope="col"> </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($contributory_factors as $contributory_factor)

                                    <tr class="table-active">

                                        <th scope="row">{{$contributory_factor->origin}}</th>

                                        <td>{{$contributory_factor->detail}}</td>
                                        <td><button class="btn btn-danger btn-xs btn-delete delete-conFac" value="{{ $contributory_factor['id'] }}"><span class="oi oi-x"></span></button></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="form-group row">
                    <label for="root_cause" class="col-sm-5 col-form-label">Identificación de causa raíz y de causas mayores si aplicaran</label>
                    <div class="col-sm-7">
                        <h6><strong>Causa raíz:</strong></h6>
                        <input type="text" class="form-control"  name="root_cause" id="root_cause" value="{{ $cause->root_cause}}">
                        <p></p>
                        <h6><strong>Causas mayores:</strong></h6>
                        <input type="text" class="form-control"  name="major_cause" id="major_cause" value="{{ $cause->major_cause }}"></div>
                </div>
            </div>
        </div>

    </form>





    <button type="submit" form="reporForm" class="btn btn-primary">Actualizar Datos</button>





    <script type="text/javascript">
        $('.datepicker').datepicker({
            endDate: "today",
            language: "es",
            orientation: "bottom auto",
            autoclose: true
        });

        $(document).on("click",".add-fc",function(event){

            event.preventDefault();

            $.ajax({
                url: "/gestion/informes/agregarFactorContributivo",
                method: "POST",
                data: {_method: 'post',
                        _token: '{{csrf_token()}}',
                        report_id:$('#report_id').val(),
                        origin_id:$('#select_origin').val(),
                        detail:$('#details_contributory_factors').val()
                },
                dataType: "json",
                success: function (data) {
                    console.log(data.success);
                    $('#details_contributory_factors').val('');
                    $.get("/api/report/"+data.report_id+"/contributoryFactors", function (data) {
                        if(data.length>0){
                            var htmlTable = '<thead>' +
                                '<tr>' +
                                '<th scope="col">Factor Contributivo</th>' +
                                '<th scope="col">Detalle</th>' +
                                '<th scope="col"> </th>' +
                                '</tr>'+
                                '</thead>'+
                                '<tbody>';

                            for(var i=0; i<data.length; i++){
                                htmlTable+='<tr class="table-active">' +
                                    '<th scope="row">'+data[i].origin+'</th>' +
                                    '<td>'+data[i].detail+'</td>' +
                                    '<td><button class="btn btn-danger btn-xs btn-delete delete-conFac" value="'+data[i].id+'"><span class="oi oi-x"></span></button></td>' +
                                    '</tr></tbody>';

                            }
                            $('#tableFacCon').html(htmlTable);
                        }
                        else {
                            $('#tableFacCon').html('<label>No se han agregado factores contributivos</label>');
                        }
                    });


                },
                error:function () {
                    alert('error')
                }
            });

        });

        $(document).on("click",".add-date",function(event){
            event.preventDefault();
            //var form_data = $(this).serialize();
            //$('#situation').val('');
            //console.log(form_data);
            $.ajax({
                url: "/gestion/informes/agregarFecha",
                method: "POST",
                data: {_method: 'post',_token:'{{csrf_token()}}',situation:$('#situation').val(),date_situation:$('#date_situation').val(),report_id:$('#report_id').val()},
                dataType: "json",
                success: function (data) {
                    console.log(data.success);
                    //alert(data.success);
                    $('#situation').val('');
                   $.get("/api/report/"+data.report_id+"/dates", function (data) {
                      if(data.length>0){
                          var htmlListDates = '';
                          for(var i=0; i<data.length; i++){

                              htmlListDates+='<li class="list-group-item d-flex justify-content-between align-items-center"><strong>'+data[i].situation+':</strong>'+data[i].date_situation +''+
                                  '<button class="btn btn-danger btn-xs btn-delete delete-date" value="'+data[i].id+'"><span class="oi oi-x"></span></button>';
                          }
                           $('#listDates').html(htmlListDates);
                      }
                      else {
                          $('#listDates').html('<li>No se han agregado fechas </li>');
                      }
                   });


                },
                error:function () {
                    alert('error')
                }
            });

        });

        $(document).on("click",".add-part",function(event){
            event.preventDefault();
            $.ajax({
                url: "/gestion/informes/agregarParticipante",
                method: "POST",
                data: {_method: 'post', _token: '{{csrf_token()}}',report_id:$('#report_id').val(),addParticipant:$('#addParticipant').val()},
                dataType: "json",
                success: function (data) {
                    console.log(data.report_id);
                    //alert(data.success);
                    $.get("/api/report/"+data.report_id+"/participants", function (data) {

                        if(data.length>0) {
                            $('#addParticipant').val('');
                            var htmlListParticipant = '';

                            for (var i = 0; i < data.length; i++) {
                                htmlListParticipant += '<li class="list-group-item d-flex justify-content-between align-items-center">' + data[i].name + '' +
                                    '<button class="btn btn-danger btn-xs btn-delete delete-url" value="' + data[i].id + '"><span class="oi oi-x"></span></button></li>';
                            }
                            $('#listParticpants').html(htmlListParticipant);
                        }
                        else {
                            $('#listParticpants').html('<li>No se han agregado participantes </li>');
                        }
                    });

                },
                error:function () {
                    alert('error')
                }
            });
        });

        $(document).on("click",".delete-conFac",function(event){
            event.preventDefault();
            var id =  $(this).val();
            $.ajax({
                url: "/contributoryFactor/"+id,
                type: "DELETE",
                data: {_method: 'delete', _token: '{{csrf_token()}}'},
                success: function (data) {
                    console.log(data);
                    //alert(data.success);
                    $.get("/api/report/"+data.report_id+"/contributoryFactors", function (data) {
                        if(data.length>0){
                            var htmlTable = '<thead>' +
                                '<tr>' +
                                '<th scope="col">Factor Contributivo</th>' +
                                '<th scope="col">Detalle</th>' +
                                '<th scope="col"> </th>' +
                                '</tr>'+
                                '</thead>'+
                                '<tbody>';

                            for(var i=0; i<data.length; i++){
                                htmlTable+='<tr class="table-active">' +
                                    '<th scope="row">'+data[i].origin+'</th>' +
                                    '<td>'+data[i].detail+'</td>' +
                                    '<td><button class="btn btn-danger btn-xs btn-delete delete-conFac" value="'+data[i].id+'"><span class="oi oi-x"></span></button></td>' +
                                    '</tr> </tbody>';

                            }
                            $('#tableFacCon').html(htmlTable);
                        }
                        else {
                            $('#tableFacCon').html('<label>No se han agregado factores contributivos</label>');
                        }
                    });
                },
                error:function () {
                    alert('No se ha eliminado el factor contributivo');
                }
            });

        });

        $(document).on("click",".delete-date",function(event){
            event.preventDefault();
            var id =  $(this).val();
            $.ajax({
                url: "/reportDate/"+id,
                type: "DELETE",
                data: {_method: 'delete', _token: '{{csrf_token()}}'},
                success: function (data) {
                    console.log(data);
                    //alert(data.success);
                    $.get("/api/report/"+data.report_id+"/dates", function (data) {
                        if(data.length>0){
                            var htmlListDates = '';
                            for(var i=0; i<data.length; i++){

                                htmlListDates+='<li class="list-group-item d-flex justify-content-between align-items-center"><strong>'+data[i].situation+':</strong>'+data[i].date_situation +''+
                                    '<button class="btn btn-danger btn-xs btn-delete delete-date" value="'+data[i].id+'"><span class="oi oi-x"></span></button>';
                            }
                            $('#listDates').html(htmlListDates);
                        }
                        else {
                            $('#listDates').html('<li>No se han agregado fechas </li>');
                        }
                    });
                },
                error:function () {
                    alert('No se ha eliminado la fecha');
                }
            });

        });

        $(document).on("click",".delete-url",function(event){
            event.preventDefault();
            var id =  $(this).val();
            $.ajax({
                url: "/participant/"+id,
                type: "DELETE",
                data: {_method: 'delete', _token: '{{csrf_token()}}'},
                success: function (data) {
                    //console.log(data);
                    alert(data.success);
                    $.get("/api/report/"+data.report_id+"/participants", function (data) {

                        if(data.length>0) {
                            var htmlListParticipant = '';

                            for(var i=0; i<data.length; i++){
                                htmlListParticipant += '<li class="list-group-item d-flex justify-content-between align-items-center">'+data[i].name+'<button class="btn btn-danger btn-xs btn-delete delete-url" value="'+data[i].id+'"><span class="oi oi-x"></span></button></li>';
                            }
                            $('#listParticpants').html(htmlListParticipant);
                            }

                        else {
                            $('#listParticpants').html('<li>No se han agregado participantes </li>');
                        }
                    });
                },
                error:function () {
                    alert('No se ha eliminado el participante')
                }
            });

        });
    </script>

@endsection

