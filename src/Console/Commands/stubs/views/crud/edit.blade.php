@extends('base')

@section('content')
<form action="{{route('[[resource]].update', $[[resource]]->id)}}" class="form" method="POST">
    @csrf
    @method('PATCH')
    <div class="card">
        <div class="card-header">
            Editar [[title]]
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