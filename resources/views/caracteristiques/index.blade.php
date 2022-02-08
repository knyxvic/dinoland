@extends('layouts.admin')

@section('content')
    <div class="row col-6 offset-3">
        <h1>Liste des caracteristiques</h1>
        <a href="{{route('caracteristiques.create')}}" class="btn btn-secondary col-2 offset-3">Create</a>
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
            @foreach($caracteristiques as $caracteristique)
                <tr>
                    <td>{{$caracteristique->id}}</td>
                    <td>{{$caracteristique->nom}}</td>
                    <td>{{$caracteristique->dinos->count()}}</td>
                    <td>
                        @if($caracteristique->dinos->count()>0)
                            Ne peut pas être supprimer car des dinosaures sont associés
                        @else
                        {!! Form::open(['url'=>'admin/caracteristiques/'.$caracteristique->id,'method' => 'delete']) !!}
                        {{Form::submit('Supprimer', ['class'=>'btn btn-danger'])}}
                        {!! Form::close() !!}
                        @endif
                        <a href="{{route('caracteristiques.show', $caracteristique->id)}}" class="btn btn-primary">Modifier</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@stop
