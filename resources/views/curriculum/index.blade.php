@extends("theme.$theme.layout")
@section('title')
Curriculum
@endsection

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-danger">{{$titulo['title']}}</h6>
        <a href="{{ route('create_curriculum')}}" class="btn btn-danger btn-sm right"> Crear Hoja de Vida</a>
    </div>
    
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Cedula</th>
                        <th>Nombre</th>
                        <th>Sexo</th>
                        <th>Email</th>
                        <th>Telefono</th>
                        <th>Grado Académico</th>
                    
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                        @foreach ($datas as $data)
                    <tr>

                           <td>{{$data->cedula}}</td>
                           <td style="text-transform: uppercase;">{{$data->nombre}}</td>
                           <td>{{($data->sexo ? 'Mujer' : 'Hombre')}}</td>
                           <td>{{$data->email}}</td> 
                           <td>{{$data->telefono}}</td>
                           
                           <td>
                            {{-- Se hace un recorrido sobre el arreglo, se valida si la variable data existe,
                                si no existe, arroja un dato vacío, luego e compara los valores de la columna grado académico 
                                con los valores del arreglo degree para establecer el grado académico real con su respectivo nombre --}}
                            @foreach ($degree as $id => $nombre)
                              {{(isset($datas) ? old('grado_academico',$data->grado_academico ) == $id ? $nombre :'' : '')  }} 
                            @endforeach
                            
                           </td>
                        

                           <td>
                          <a href="{{ route('edit_curriculum', $data->id)}}" class="btn btn-secondary"> Editar</a>
                           </td>
                    </tr>

                        @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
@endsection