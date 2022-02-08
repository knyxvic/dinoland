@extends('layouts.admin')

@section('content')
    <div class="row col-6 offset-3">
        <h1>Liste des espèces</h1>
        <a href="{{route('especes.create')}}" class="btn btn-secondary col-2 offset-3">Create</a>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Id</th>
                <th>Nom</th>
                <th>Nb Dinos attaché</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($especes as $espece)
                <tr>
                    <td>{{$espece->id}}</td>
                    <td>{{$espece->nom}}</td>
                    <td>{{$espece->dinos->count()}}</td>
                    <td>
                        @if($espece->dinos->count()>0)
                            Ne peut pas être supprimer car des dinosaures sont associés
                        @else
                        {!! Form::open(['url'=>'admin/especes/'.$espece->id,'method' => 'delete']) !!}
                        {{Form::submit('Supprimer', ['class'=>'btn btn-danger'])}}
                        {!! Form::close() !!}
                        @endif
                        <a href="{{route('especes.show', $espece->id)}}" class="btn btn-primary">Modifier</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@stop
