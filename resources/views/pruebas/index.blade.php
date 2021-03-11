@extends("theme.$theme.layout")
@section('title')
Resultados Pruebas
@endsection

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-danger">{{$titulo['title']}}</h6>
        <a href="{{ route('create_prueba')}}" class="btn btn-danger btn-sm right">Registrar Resultados</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered" id="table" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Cédula</th>
                        <th>Nombre</th>
                        <th>Carrera</th>
                        <th>Institución</th>
                        <th>Fecha Disponibilidad</th>
                        <th>Fecha Envío</th>
                        <th>Psicometría</th>
                        <th>Competencias</th>
                        <th>Aprobado</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($datas as $data)
                    <tr>


                        <td>{{$data->curriculum->cedula}}</td>
                        <td style="text-transform: uppercase;">{{$data->curriculum->nombre}}</td>
                        <td>{{$data->curriculum->carrera->programa}}</td>
                        <td>{{$data->curriculum->carrera->institucion}}</td>
                        <td>{{$data->curriculum->fecha_disposicion}}</td>
                        <td>{{$data->created_at}}</td>
                        <td>{{$data->psicometria_ratio}}%</td>
                        <td>{{$data->competencias_ratio}}%</td>
                        <td>

                            {{-- Implementar Toggle para mejorar Apariencia; los intentos anteriores no han 
                                funcionado. Seguir intentando --}}
                            <div class="checkbox text-center">
                                <meta name="csrf-token" content="{{ csrf_token() }}" />
                                <input class="toggle-class" type="checkbox" id="ckbox entrevista"
                                    {{ ($data->resultado) ? 'checked' : '' }}
                                    data-route="{{route('aprobado_prueba', $data->id)}}" 
                                    data-onstyle="success"
                                    data-on="Apto" 
                                    data-off="No Apto" 
                                    data-offstyle="danger" 
                                    data-toggle="toggle">

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
<script src="{{asset("pages/scripts/pruebas/completed.js")}}" type="text/javascript"></script>
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

        // Setup - add a text input to each footer cell
        $('#table thead tr').clone(true).appendTo('#table thead');
        $('#table thead tr:eq(1) th').each(function (i) {
            var title = $(this).text();
            $(this).html('<input type="text" class="form-control" placeholder="Buscar" />');

            $('input', this).on('keyup change', function () {
                if (table.column(i).search() !== this.value) {
                    table
                        .column(i)
                        .search(this.value)
                        .draw();
                }
            });
        });



    });
</script>
@endsection