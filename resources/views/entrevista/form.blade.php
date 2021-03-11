<div class="form-row">
    <div class="form-group col-md-6">
        <label for="cupos_id">Cupos</label>
        {{-- Elaborar Selector múltiple,  así guardar varios candidatos al mismo tiempo --}}
        <select name="cupos_id"  class="form-control selectpicker" data-live-search="true data-live-search">

        <option value="">Elija un Área</option>
        @foreach ($cupos as $cupos )
        <option style="text-transform: uppercase;" 
        value="{{$cupos->id}}"
        data-subtext="| {{$cupos->empleado->nombre}}" >
            {{$cupos->area->area}}
        </option>
        
        @endforeach
       
    </select>

    </div>
    <div class="form-group col-md-6">
        <label for="prueba_id">Candidatos que Aprobaron las pruebas</label>
        {{-- Elaborar Selector múltiple,  así guardar varios candidatos al mismo tiempo --}}
        <select name="prueba_id"  class="form-control selectpicker" data-live-search="true data-live-search">

        <option value="">Elija un Candidato </option>
        @foreach ($prueba as $prueba )
        <option style="text-transform: uppercase;" value="{{$prueba->id}}" 
            data-subtext="{{ $prueba->curriculum->cedula}} | {{ $prueba->curriculum->recomendado ? 'Recomendado' : 'No tiene recomendación'}}">
            {{$prueba->curriculum->nombre}}
        </option>
        
        @endforeach
       
    </select>

    </div>
</div>


<div class="form-row">

    
    <div class="form-group col-md-6">
        <label for="estado">Estado del Candidato</label>
    <br>
    {{-- Funcionando Correctamente--}}
        <input class="form-control" name="estado" type="checkbox" 
        {{isset($data) ? old('estado', $data->estado) == 'checked' ? 'checked' : '' : '' }}  
        data-toggle="toggle" 
        data-on="Seleccionado" 
        data-off="NoSeleccionado" 
        data-onstyle="success" 
        data-offstyle="danger">
    </div>




    <div class="form-group col-md-6">
        <label for="fecha_entrevista">Fecha de la Entrevista</label>
        <input type="date" name="fecha_entrevista" id="fecha_entrevista" class="form-control" value="{{old('fecha_entrevista', date('Y-m-d'))}}" required/>

    </div>
</div>
    
<div class="form-row">

    <div class="form-group col-md-6">
        <label for="hora_entrevista">Hora de la Entrevista</label>
        <input type="time" name="hora_entrevista" id="hora_entrevista" class="form-control" value="{{old('hora_entrevista', date('hh:mm'))}}" required/>
    </div>
    <div class="form-group col-md-6">
        <label for="calificacion">Calificacion</label>
        <input type="number" name="calificacion" class="form-control" min="1" value="{{old('calificacion', $data->calificacion ?? '')}}">
    </div>

</div>

