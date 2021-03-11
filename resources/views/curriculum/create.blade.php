@extends("theme.$theme.layout")
@section('title')
Crear Curriculum
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
        <form action="{{route('store_curriculum')}}" method="POST" autocomplete="off">
            @csrf

                @include('curriculum.form')
                <hr>
                @include('includes.button-form-create')


        </form>
    </div>
</div>
@endsection