$(document).ready(function(){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


$("#agregar_id").click(function(){
        
    var curriculum_id = document.getElementById("curriculum_id").value;   
    var psicometria_ratio = document.getElementById("psicometria_ratio").value;
    var psicometria_descripcion = document.getElementById("psicometria_descripcion").value;
    var competencias_ratio = document.getElementById("competencias_ratio").value;
    var competencias_descripcion = document.getElementById("competencias_descripcion").value;

    if(curriculum_id){
        $('#table_prueba > tbody').empty();
        $.ajax({
            url: "/store_prueba",
            type:'POST',
            data: {
               
                    curriculum_id:curriculum_id,
                    psicometria_ratio:psicometria_ratio,
                    psicometria_descripcion:psicometria_descripcion,
                    competencias_ratio:competencias_ratio,
                    competencias_descripcion:competencias_descripcion,
                   _token: $('meta[name="csrf-token"]').attr('content')
                },
            success: function(data) {
                if($.isEmptyObject(data.error)){
                    for(var i=0; i < data.curriculum.length; i++){
                        // No sirve
                      for(var j=0; j < data.prueba.length; j++){
                            
                            var  table = '<tr>'+
                            '<th>'+i+'</th>'+
                            '<th>'+data.curriculum[i].cedula+'</th>'+
                            '<th>'+data.curriculum[i].nombre+'</th>'+
                            '<th>'+data.curriculum[i].email+'</th>'+
                            '<th>'+data.curriculum[i].email+'</th>'+
                            '<th>'+data.prueba[j].psicometria_ratio+'</th>'+
                            '<th><a class="btn eliminar_exequias" style="color:red" data-id="'+data.curriculum[i].id +'" id="btn-eliminar-exequial" name="btn-eliminar-exequial"><i class="fa fa-trash" aria-hidden="true"></i></a></th>'
                            '</tr>';
                        
                            $("#table_prueba").append(table);                        
                        }
                    }
                        
            
            
                }else{
                    alerta("Ocurrio un error");
                }
            }
        }); 
    }      
});






});

