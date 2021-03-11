@extends("theme.$theme.layout")
@section('title')
Editar Pruebas
@endsection

@section('content')
<div class="card shadow mb-4">


    @include('includes.form-error')
    @include('includes.message')

    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-danger">{{$titulo['title']}}</h6>
    </div>

    <div class="card-body">
        <form action="{{route('update_curriculum', ['id' => $data->id])}}" method="POST" autocomplete="off">
            @csrf @method("put")
                @include('pruebas.form')
                <hr>
                @include('includes.button-form-create')
        </form>
    </div>
</div>
@endsection