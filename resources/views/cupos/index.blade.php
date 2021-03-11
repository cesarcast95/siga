@extends("theme.$theme.layout")
@section('title')
Cupos
@endsection



@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-danger">{{$titulo['title']}}</h6>
        <a href="{{route('create_seleccion')}}" class="btn btn-danger btn-sm right">Crear Cupo</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nombre Empresa</th>
                        <th>Aárea</th>
                        <th>Empleado</th>
                        <th>Cantidad Vacantes</th>
                        <th>Vacantes Ocupadas</th>
                        <th>Estado</th>


                    </tr>
                </thead>
                <tbody>
                    @foreach ($seleccion as $seleccion)
                        <tr>
                            <td>{{$seleccion->empresa->nombre}}</td>
                            <td>{{$seleccion->area->area}}</td>
                            <td>{{$seleccion->empleado->nombre}}</td>
                            <td>{{$seleccion->cantidad_cupos}}</td>
                            {{-- Mostrar las entrevistas que posean un estado 1... en este momento no sirve --}}
                            <th>{{$seleccion->entrevistas->where('estado', 1)->count()}}</th>
                            <td><center>
                                @if ($seleccion->entrevistas->where('estado', 1)->count() == $seleccion->cantidad_cupos)
                                <div class="btn btn-secondary" role="alert">
                                    Cerrado
                                  </div>                             
                                  @else
                                  <div class="btn btn-success" role="alert">
                                    Activo
                                  </div>   
                                 
                                @endif
                            </center>
                            
                            </td>
                            

                        </tr>
                    @endforeach
             
                </tbody>
            </table>
        </div>

    </div>
</div>

@endsection

