<div class="form-row">
    <div class="form-group col-md-6">
        <label for="sexo">Candidato</label>
        {{-- Elaborar Selector múltiple,  así guardar varios candidatos al mismo tiempo --}}
        <select name="curriculum_id" id="curriculum_id" class="form-control selectpicker"
            data-live-search="true data-live-search">

            <option value="">Seleccione un Candidato</option>
            @foreach ($curriculum as $curriculum )
            <option style="text-transform: uppercase;" value="{{$curriculum->id}}" {{
                (isset($data) ? old('curriculum_id', 
                $data->curriculum_id) == $curriculum->id ? 'selected' : '' : '')
            }} data-subtext="{{ $curriculum->cedula}} {{ $curriculum->email}}">
                {{$curriculum->nombre}}
            </option>

            @endforeach

        </select>

    </div>
    <div class="alert alert-danger form-group col-md-6" role="alert">
        <h4 class="alert-heading"><strong>IMPORTANTE</strong></h4>
        <p>Una vez usted guarde este formulario, se envía automáticamente
            un correo al candidato, notificando sobre los resultados de las pruebas psicométricas.</p>
    </div>
</div>


<div class="form-row">
    <div class="form-group col-md-6">
        <label for="psicometria_ratio">Psicometria %</label>
        <input type="number" name="psicometria_ratio" id="psicometria_ratio" class="form-control" style="text-transform:uppercase"
            value="{{old('psicometria_ratio', $data->psicometria_ratio ?? '')}}">
    </div>

    <div class="form-group col-md-12">
        <label for="psicometria_descripcion">Descripción de Psicometria</label>

        <textarea name="psicometria_descripcion" id="psicometria_descripcion" class="form-control" rows="3"
            value="{{old('psicometria_descripcion', $data->psicometria_descripcion ?? '')}}">@isset($data){{$data->psicometria_descripcion}}@else @endIf</textarea>

    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="competencias_ratio">Competencias %</label>
        <input type="number" name="competencias_ratio" id="competencias_ratio" class="form-control" style="text-transform:uppercase"
            value="{{old('competencias_ratio', $data->competencias_ratio ?? '')}}">
    </div>

    <div class="form-group col-md-12">
        <label for="competencias_descripcion">Descripción de Competencias</label>

        <textarea name="competencias_descripcion" id="competencias_descripcion" class="form-control" rows="3"
            value="{{old('competencias_descripcion', $data->competencias_descripcion ?? '')}}">@isset($data){{$data->competencias_descripcion}}@else @endIf</textarea>

    </div>
</div>
