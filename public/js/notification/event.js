$(function () {
    $('#select_classification').on('change',selectChangeEvent);
    
});
$(function () {
    $('#select_name_event').on('change',selectDetails);
});



function selectChangeEvent() {
    var classifications_id = $('#select_classification').val();
    if((classifications_id!==null)&&(classifications_id!=='')){
        $.get("/api/classification/"+classifications_id+"/nameEvents", function (data) {

            var htmlNameEvent = '<option value> Escoja evento</option>';

            for(var i=0; i<data.length; i++){
                htmlNameEvent += '<option  value ="'+data[i].id+'"> '+data[i].name+'</option>';
            }
            $('#select_name_event').html(htmlNameEvent);
        });
    }
    else {
        $('#select_name_event').html('<option value> Escoja evento</option>');
    }

}
function selectDetails() {
    var name_event_id =$('#select_name_event').val();

    $.get("/api/nameEvents/"+name_event_id+"/details", function (detail) {
        if(detail.length>0){
            $('#detail_text').attr('disabled',true);
            var htmlDetail = '<option value=""> Escoja detalles</option>';
            for(var i=0;i<detail.length; i++){
                htmlDetail +='<option  value = "'+detail[i].id +'">' + detail[i].detail+'</option>';
            }
            $('#select_details').html(htmlDetail);
        }
        else{
            $('#detail_text').attr('disabled',false);
        }


    });

}