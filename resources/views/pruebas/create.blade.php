@extends("theme.$theme.layout")
@section('title')
Resultados Pruebas
@endsection

@section('content')
<div class="card shadow mb-4">


    @include('includes.form-error')
    @include('includes.message')

    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-danger">{{$titulo['title']}}</h6>
    </div>
{{-- Falta ser terminado  --}}
    <div class="card-body">
      {{ csrf_field() }}
        <form >
            @csrf
            

                @include('pruebas.form')
                
                <button id="agregar_id" class="btn btn-success" type="button">Adicionar a la tabla</button>
                <a type="submit" href="{{url('prueba_envio')}}" class="btn btn-success">Guardar</a>
                
                <hr>

                <div class="form-row">
                    <div class="form-group table-responsive col-md-12">
                    
                        <table class="table table-hover " id="table_prueba">
                            <thead class="bg-danger text-white">
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Cédula</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Correo</th>
                                <th scope="col">Opciones</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                               
                              </tr>
                            </tbody>
                          </table>
                        
                    </div>
                  
                </div>
                


        </form>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{asset("pages/scripts/pruebas/table_pruebas.js")}}" type="text/javascript"></script>
    
@endsection