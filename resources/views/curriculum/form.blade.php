<div class="form-row">
    <div class="form-group col-md-6">
        <label for="cedula">Cédula</label>
        <input type="number" name="cedula" class="form-control" value="{{old('cedula', $data->cedula ?? '')}}">
    </div>
    <div class="form-group col-md-6">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" class="form-control" style="text-transform:uppercase"
            value="{{old('nombre', $data->nombre ?? '')}}">
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-6">
        <label for="sexo">Género</label>

        <select name="sexo" class="form-control">
            <option value="">Seleccione un Género</option>
            @foreach ($gender as $id => $nombre )
            <option value={{$id}} {{(isset($data) ? old('sexo',$data->sexo ) == $id ? 'selected':'' : '' )   }}>
                {{$nombre}}</option>
            @endforeach
        </select>

    </div>
    <div class="form-group col-md-6">
        <label for="email">Email</label>
        <input type="email" name="email" class="form-control" value="{{old('email', $data->email ?? '')}}">
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-6">
        <label for="telefono">telefono</label>
        <input type="number" name="telefono" class="form-control" value="{{old('telefono', $data->telefono ?? '')}}">
    </div>
    <div class="form-group col-md-6">
        <label for="grado_academico">Grado Académico</label>

        <select name="grado_academico" class="form-control">
            <option value="">Seleccione un Grado Académico</option>
            @foreach ($degree as $id => $nombre)
            <option value={{$id}}
                {{(isset($data) ? old('grado_academico',$data->grado_academico ) == $id ? 'selected':'' : '')  }}>
                {{$nombre}}</option>
            @endforeach
        </select>

    </div>
</div>

<div class="form-row">

    <div class="form-group col-md-6">
        <label for="carrera_id">Carrera</label>

        <select name="carrera_id" id="carrera_id" class="form-control selectpicker"
            data-live-search="true data-live-search">
            <option value="">Seleccione una Carrera </option>
            @foreach ($carreras as $carrera )
            <option value="{{$carrera->id}}" {{
                    (isset($data) ? old('carrera_id', $data->carrera_id) == $carrera->id ? 'selected' : '' : '')
                }} data-subtext="{{$carrera->institucion . ' | ' . $carrera->municipio}}">
                {{$carrera->programa}}
            </option>
            @endforeach

        </select>

    </div>
    <div class="form-group col-md-6">
        <label for="fecha_disposicion">Fecha de Disponibilidad</label>
        <input type="date" name="fecha_disposicion" class="form-control"
            value="{{old('fecha_disposicion', $data->fecha_disposicion ?? '')}}">
    </div>
</div>

<div class="form-row">

    <div class="form-group col-md-6">
        <label for="disponibilidad">Disponibilidad</label>

        <select name="disponibilidad" class="form-control">
            <option value="">Seleccione Disponibilidad</option>
            @foreach ($available as $id => $nombre )
            <option value={{$id}}
                {{(isset($data) ? old('disponibilidad',$data->disponibilidad ) == $id ? 'selected':'' : '' )   }}>
                {{$nombre}}</option>
            @endforeach
        </select>

    </div>

    <div class="form-group col-md-6">
        <label for="recomendado">Recomendado</label>

        <select name="recomendado" id="recomendado" class="form-control">
            <option value="" selected>Ha Sido Recomendado?</option>
            @foreach ($recomended as $id => $nombre )
            <option value={{$id}}
                {{(isset($data) ? old('recomendado',$data->recomendado ) == $id ? 'selected':'' : '' )   }}>{{$nombre}}
            </option>
            @endforeach
        </select>

    </div>
</div>

<div class="form-row vinculo">


    <div class="form-group col-md-6">
        <label for="empleado_id">Empleado</label>
        <select name="empleado_id" class="form-control selectpicker" data-live-search="true data-live-search">
            <option value="">Seleccione el Empleado</option>
            @foreach ($empleados as $empleado )
            <option value="{{$empleado->id}}" {{
                (isset($data) ?  old('empleado_id', $data->empleado_id) == $empleado->id ? 'selected' : '' : '')
                }} data-subtext="{{$empleado->no_personal}}">
                {{$empleado->nombre}}
            </option>
            @endforeach
        </select>
    </div>

    <div class="form-group col-md-6">
        <label for="parentesco">Parentesco</label>

        <select name="parentesco" class="form-control">
            <option value="">Seleccione Parentesco</option>
            @foreach ($relationship as $id => $nombre )
            <option value={{$id}}
                {{(isset($data) ? old('parentesco',$data->parentesco ) == $id ? 'selected':'' : '' )   }}>{{$nombre}}
            </option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-row">


    <div class="form-group col-md-6">
        <label for="planta">Planta</label>

        <select name="planta" class="form-control">
            <option value="">Seleccione la Planta</option>
            @foreach ($plant as $id => $nombre )
            <option value={{$id}} {{(isset($data) ? old('planta',$data->planta ) == $id ? 'selected':'' : '' )   }}>
                {{$nombre}}</option>
            @endforeach
        </select>

    </div>

    <div class="form-group col-md-6">
        <label for="obervacion">Observación</label>

        <textarea name="obervacion" class="form-control" rows="3"
            value="{{old('obervacion', $data->obervacion ?? '')}}">@isset($data){{$data->obervacion}}@else @endIf</textarea>
            
    </div>
</div>

{{-- Javascript para ocultar campos según el requerimiento --}}
<script src="{{asset("assets/$theme/vendor/jquery/jquery.min.js")}}"></script>
<script type="text/javascript">
     console.log($('#recomendado').val());
     if ($('#recomendado').val() == "1") {
            $('.vinculo').show();
            // Posee vinculo familiar con un empleado, muestra bloque de empleado y parentesco
        } else $(".vinculo").hide();
    
    var Recomendado = jQuery('#recomendado');
    var select = this.value;
    Recomendado.change(function () {
        if ($(this).val() == "1") {
            $('.vinculo').show();
            // Posee vinculo familiar con un empleado, muestra bloque de empleado y parentesco
        } else $(".vinculo").hide();
    });
</script>
