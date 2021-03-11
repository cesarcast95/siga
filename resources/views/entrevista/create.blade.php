@extends("theme.$theme.layout")
@section('title')
Generar Entrevista
@endsection

@section('styles')

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
        <form action="{{route('entrevista.store')}}" method="POST" autocomplete="off">
            @csrf

                @include('entrevista.form')
                <hr>
                @include('includes.button-form-create')
                
        </form>
    </div>
</div>
@endsection

@section('scripts')

@endsection