@extends('layouts.admin')

@section('content')
    <div class="row col-6 offset-3">
        <h1>Liste des nourritures</h1>
        <a href="{{route('environnements.create')}}" class="btn btn-secondary col-2 offset-3">Create</a>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Id</th>
                <th>Nom</th>
                <th>Nb enclos attaché</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($environnements as $environnement)
                <tr>
                    <td>{{$environnement->id}}</td>
                    <td>{{$environnement->nom}}</td>
                    <td>{{$environnement->enclos->count()}}</td>
                    <td>@if($environnement->enclos->count()>0)
                            Ne peut pas être supprimer car des enclos sont associés
                        @else
                            {!! Form::open(['url'=>'admin/environnements/'.$environnement->id,'method' => 'delete']) !!}
                            {{Form::submit('Supprimer', ['class'=>'btn btn-danger'])}}
                            {!! Form::close() !!}
                        @endif
                        <a href="{{route('environnements.show', $environnement->id)}}" class="btn btn-primary">Modifier</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@stop
