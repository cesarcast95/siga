// Entrevista Aprobado
$(document).ready(function(){
    $('.toggle-class').change(function() {
        $('#pleaseWait').modal('show');
        var estado = ($(this).is(':checked')) ? 1 : 0;
       
        $.post($(this).data('route'), { estado:estado }, function(data) {
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
