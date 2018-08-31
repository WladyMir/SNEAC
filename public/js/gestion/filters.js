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
                        '<th scope="row">'+data[i].place_id+'</th>' +
                        '<td>'+data[i].event_date+'</td>' +
                        '<td>'+data[i].event_name_id+'</td>' +
                        '<td>'+data[i].event_type+'</td>' +
                        '<td>'+data[i].name_patient+'</td>' +
                        '<td>'+data[i].event_status+'</td>' +
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