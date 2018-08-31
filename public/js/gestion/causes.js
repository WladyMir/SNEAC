$(function () {
    $('#select_origin').on('change',selectChangeFactor);

});
function selectChangeFactor() {
    var origin_id = $('#select_origin').val();

    if((origin_id!==null)&&(origin_id!=='')){
        //alert(origin_id);
        $.get("/api/origin/"+origin_id+"/contributoryFactor", function (data) {
            var htmlNameEvent = '<option value> Escoja factor contribuyente</option>';

            for(var i=0; i<data.length; i++){
                htmlNameEvent += '<option  value ="'+data[i].contributory_factor+'">'+data[i].contributory_factor+'</option>';
            }
            $('#select_contributory_factor').html(htmlNameEvent);
        });
    }
    else {
        $('#select_contributory_factor').html('<option value> Escoja factor contribuyente</option>');
    }
}