<div class="form-row">
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
    <div class="form-group col-md-6">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" class="form-control" style="text-transform:uppercase"
            value="{{old('nombre', $data->nombre ?? '')}}">
    </div>
</div>