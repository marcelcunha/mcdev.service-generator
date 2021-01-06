@extends('base')

@section('content')
<form action="{{route('[[resource]].store')}}" class="form" method="POST">
    @csrf
    <div class="card">
        <div class="card-header">
            Novo [[title]]
        </div>
        <div class="card-body">
            @include('app.[[path]].base')
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
    </div>
</form>
@endsection