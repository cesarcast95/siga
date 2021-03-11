@section('styles')
<link href="{{asset("css/bootstrap-toggle/bootstrap-toggle.min.css")}}"  rel="stylesheet">  

@endsection


<div class="form-row">
    <div class="form-group col-md-6">
        <label for="empresa_id">Empresa a que Está Dirigido este Cupo </label>
        {{-- Elaborar Selector múltiple,  así guardar varios candidatos al mismo tiempo --}}
        <select name="empresa_id"  class="form-control selectpicker" data-live-search="true data-live-search">

        <option value="">Seleccione la Empresa </option>
        @foreach ($empresa as $empresa )
        <option style="text-transform: uppercase;" value="{{$empresa->id}}" {{
                (isset($data) ? old('empresa_id', 
                $data->empresa_id) == $empresa->id ? 'selected' : '' : '')
            }}>
            {{$empresa->nombre}}
        </option>
        
        @endforeach
       
    </select>

    </div>


    <div class="form-group col-md-6">
        <label for="area_id">Área a que Está Dirigido este Cupo</label>
        {{-- Elaborar Selector múltiple,  así guardar varios candidatos al mismo tiempo --}}
        <select name="area_id"  class="form-control selectpicker" data-live-search="true data-live-search">

        <option value="">Seleccione el Área </option>
        @foreach ($area as $area )
        <option style="text-transform: uppercase;" value="{{$area->id}}" {{
                (isset($data) ? old('area_id', 
                $data->area_id) == $area->id ? 'selected' : '' : '')
            }} data-subtext="{{ $area->direccion}} | {{ $area->gerencia}}">
            {{$area->area}}
        </option>
        
        @endforeach
       
    </select>

    </div>
    

</div>

<div class="form-row">

    <div class="form-group col-md-6">
        <label for="empleado_id">Empleado a quien Está Dirigido este Cupo</label>
        {{-- Elaborar Selector múltiple,  así guardar varios candidatos al mismo tiempo --}}
        <select name="empleado_id"  class="form-control selectpicker" data-live-search="true data-live-search">

        <option value="">Seleccione el Empleado </option>
        @foreach ($empleado as $empleado )
        <option style="text-transform: uppercase;" value="{{$empleado->id}}" {{
                (isset($data) ? old('empleado_id', 
                $data->empleado_id) == $empleado->id ? 'selected' : '' : '')
            }} data-subtext="{{ $empleado->no_personal}} | {{ $empleado->cedula}}">
            {{$empleado->nombre}}
        </option>
        
        @endforeach
       
    </select>

    </div>


</div>




<div class="form-row">
    <div class="form-group col-md-6">
        <label for="estado">Estado del Proceso del Cupo</label>
    <br>
    {{-- Funcionando Correctamente--}}
        <input class="form-control" name="estado" type="checkbox" 
        {{isset($data) ? old('estado', $data->estado) == 'checked' ? 'checked' : '' : '' }}  
        data-toggle="toggle" 
        data-on="Activo" 
        data-off="Inactivo" 
        data-onstyle="success" 
        data-offstyle="danger">
    </div>
</div>