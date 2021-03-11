@extends("theme.$theme.layout")
@section('title')
Entrevistas
@endsection



@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-danger">{{$titulo['title']}}</h6>
        <a href="{{route('entrevista.create')}}" class="btn btn-danger btn-sm right">Crear Entrevista</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered" id="table" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nombre Proceso</th>
                        <th>Fecha</th>
                        <th>Entrevistador</th>
                        <th>Área Encargada</th>
                        <th>Entrevistado</th>
                        <th>Cédula</th>
                        <th>Estado</th>


                    </tr>
                </thead>
                <tbody>
                    @foreach ($entrevistas as $entrevista)
                        <tr>
                            <td>{{$entrevista->cupos->empresa->nombre}}</td>
                            <td>{{$entrevista->fecha_entrevista}}</td>
                            <td>{{$entrevista->cupos->empleado->nombre}}</td>
                            <td>{{$entrevista->cupos->area->area}}</td>
                            <th style="text-transform: uppercase;">{{$entrevista->prueba->curriculum->nombre}}</th>
                            <th >{{$entrevista->prueba->curriculum->cedula}}</th>
                            <td>
                             <div class="checkbox text-center">
                                <meta name="csrf-token" content="{{ csrf_token() }}" />
                                <input  class="toggle-class" type="checkbox" id="ckbox" {{ ($entrevista->estado) ? 'checked' : '' }}
                                    data-route="{{route('entrevista.aprobado', $entrevista->id)}}"
                                    data-onstyle="success" 
                                    data-on="Seleccionado" 
                                    data-off="NoSeleccionado"
                                    data-offstyle="danger"
                                    data-toggle="toggle" 
                                     
                                    >
                            
                                </div>
                            </td>
                        </tr>
                    @endforeach
             
                </tbody>
            </table>
        </div>

    </div>
</div>

@endsection

@section('scripts')
<script src="{{asset("pages/scripts/pruebas/aprobado.js")}}" type="text/javascript"></script>
{{-- Para que no marque error de Token al hacer check List --}}
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    // DataTables, de esta manera no habrán problemas con la librería SweetAlert
    // Todo debe estar dentro de esta función para el correcto funcionamientoo
    $(document).ready(function () {

//  Activa Datatables
var table = $('#table').DataTable({
    orderCellsTop: true,
    fixedHeader: true
});




});

</script>
@endsection