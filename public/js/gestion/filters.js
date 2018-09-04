$(function () {
    $('#select_filter').on('change',selectChangeEvent);

});

$(function () {
    $('#select_detail').on('change',changeTable);

});

function selectChangeEvent() {
    var filter = $('#select_filter').val();
    if(filter=="0"){
        $.get("/api/places", function (data) {

            var htmlSelect = '<option value> Escoja Unidad o Sevicio</option>';

            for(var i=0; i<data.length; i++){
                htmlSelect += '<option  value ="'+data[i].id+'"> '+data[i].place+'</option>';
            }
            $('#select_detail').html(htmlSelect);
        });

    }
    else if(filter=="1"){
        var htmlSelect = '<option value> Escoja Tipo de evento</option>' +
            '<option value="Sin clasificar">Sin clasificar</option>' +
            '<option value="Incidente">Incidente</option>' +
            '<option value="Evento adverso">Evento adverso</option>' +
            '<option value="Evento centinela">Evento centinela</option>';
            $('#select_detail').html(htmlSelect);
    }
    else if(filter=="2"){
        var htmlSelect = '<option value>Escoja Estado del evento</option>' +
            '<option value="Pendiente">Pendiente</option>' +
            '<option value="Realizando Análisis">Realizando Análisis</option>' +
            '<option value="Informe">Informe</option>' +
            '<option value="En plan de mejora">En plan de mejora</option>';
        $('#select_detail').html(htmlSelect);
    }
    else {
        $('#select_detail').html('<option value>Seleccione un filtro</option>');
    }

}



function changeTable() {
    var detail=$('#select_detail').val();
    var filter = $('#select_filter').val();
    if(filter=="0"){
        $.get("/api/notification/place/"+detail+"",function (data) {
            if(data.length>0){
                var htmlTable='<table class="table table-hover table-justified" id="tableNotifications">'+
                    '<thead>'+
                    '<tr>'+
                    '<th scope="col">Lugar de ocurrencia del evento</th>'+
                    '<th scope="col">Fecha Notificación</th>'+
                    '<th scope="col">Nombre del evento</th>'+
                    '<th scope="col">Tipo de Evento</th>'+
                    '<th scope="col">Nombre del paciente</th>'+
                    '<th scope="col">Estado del evento</th>'+
                    '</tr>'+
                    '</thead>'+
                    '<tbody>';
                for(var i=0; i<data.length; i++){
                    htmlTable+='<tr class="table-active">' +
                        '<th scope="row">'+data[i].place.place+'</th>' +
                        '<td>'+data[i].event_date+'</td>' +
                        '<td>'+data[i].event_name.name+'</td>' +
                        '<td>'+data[i].event_type+'</td>' +
                        '<td>'+data[i].name_patient+'</td>' +
                        '<td>'+data[i].event_status+'</td>' +
                        '<td><a href="/gestion/notificaciones/'+data[i].id+'/detalles" class="btn btn-primary">Gestionar</a></td>'+
                        '</tr>'
                    ;
                }

                htmlTable+='</tbody>';
                console.log(htmlTable);
                $('#tableNotifications').html(htmlTable);

            }
            else{
                $('#tableNotifications').html('<label>No se han encontrado notificaciones con esas caracteristicas</label>');
            }

        })
    }
    else if(filter=="1"){
        $.get("/api/notification/eventType/"+detail+"",function (data) {
            if(data.length>0){
                var htmlTable='<table class="table table-hover table-justified" id="tableNotifications">'+
                    '<thead>'+
                    '<tr>'+
                    '<th scope="col">Lugar de ocurrencia del evento</th>'+
                    '<th scope="col">Fecha Notificación</th>'+
                    '<th scope="col">Nombre del evento</th>'+
                    '<th scope="col">Tipo de Evento</th>'+
                    '<th scope="col">Nombre del paciente</th>'+
                    '<th scope="col">Estado del evento</th>'+
                    '</tr>'+
                    '</thead>'+
                    '<tbody>';
                for(var i=0; i<data.length; i++){
                    htmlTable+='<tr class="table-active">' +
                        '<th scope="row">'+data[i].place.place+'</th>' +
                        '<td>'+data[i].event_date+'</td>' +
                        '<td>'+data[i].event_name.name+'</td>' +
                        '<td>'+data[i].event_type+'</td>' +
                        '<td>'+data[i].name_patient+'</td>' +
                        '<td>'+data[i].event_status+'</td>' +
                        '<td><a href="/gestion/notificaciones/'+data[i].id+'/detalles" class="btn btn-primary">Gestionar</a></td>'+
                        '</tr>'
                    ;
                }

                htmlTable+='</tbody>';
                console.log(htmlTable);
                $('#tableNotifications').html(htmlTable);

            }
            else{
                $('#tableNotifications').html('<label>No se han encontrado notificaciones con esas caracteristicas</label>');
            }

        })
    }
    else if(filter=="2"){
        $.get("/api/notification/eventStatus/"+detail+"",function (data) {
            if(data.length>0){
                var htmlTable='<table class="table table-hover table-justified" id="tableNotifications">'+
                    '<thead>'+
                    '<tr>'+
                    '<th scope="col">Lugar de ocurrencia del evento</th>'+
                    '<th scope="col">Fecha Notificación</th>'+
                    '<th scope="col">Nombre del evento</th>'+
                    '<th scope="col">Tipo de Evento</th>'+
                    '<th scope="col">Nombre del paciente</th>'+
                    '<th scope="col">Estado del evento</th>'+
                    '</tr>'+
                    '</thead>'+
                    '<tbody>';
                for(var i=0; i<data.length; i++){
                    htmlTable+='<tr class="table-active">' +
                        '<th scope="row">'+data[i].place.place+'</th>' +
                        '<td>'+data[i].event_date+'</td>' +
                        '<td>'+data[i].event_name.name+'</td>' +
                        '<td>'+data[i].event_type+'</td>' +
                        '<td>'+data[i].name_patient+'</td>' +
                        '<td>'+data[i].event_status+'</td>' +
                        '<td><a href="/gestion/notificaciones/'+data[i].id+'/detalles" class="btn btn-primary">Gestionar</a></td>'+
                        '</tr>'
                    ;
                }

                htmlTable+='</tbody>';
                console.log(htmlTable);
                $('#tableNotifications').html(htmlTable);

            }
            else{
                $('#tableNotifications').html('<label>No se han encontrado notificaciones con esas caracteristicas</label>');
            }

        })
    }

}