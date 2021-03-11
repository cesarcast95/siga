// Resultado Pruebas
$(document).ready(function(){
    $('.toggle-class').change(function() {
        $('#pleaseWait').modal('show');
        var resultado = ($(this).is(':checked')) ? 1 : 0;
       
        $.post($(this).data('route'), { resultado:resultado }, function(data) {
            $('#pleaseWait').modal('hide');
            if(data.response) {
                if (data.type == 1) {
                    toastr.success(data.message);
                } else {
                    toastr.warning(data.message_no);

                }
            } else {
                toastr.error(data.message);
            }
        });
    });
});
