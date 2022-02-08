@extends('layouts.admin')

@section('content')
    <div class="row col-6 offset-3">
        <h1>Liste des types enclos</h1>
        <a href="{{route('typeEnclos.create')}}" class="btn btn-secondary col-2 offset-3">Create</a>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Id</th>
                <th>Nom</th>
                <th>Nb Enclos attaché</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($typesEnclos as $typeEnclos)
                <tr>
                    <td>{{$typeEnclos->id}}</td>
                    <td>{{$typeEnclos->nom}}</td>
                    <td>{{$typeEnclos->enclos->count()}}</td>
                    <td>@if($typeEnclos->enclos->count()>0)
                            Ne peut pas être supprimer car des enclos sont associés
                        @else
                            {!! Form::open(['url'=>'admin/typeEnclos/'.$typeEnclos->id,'method' => 'delete']) !!}
                            {{Form::submit('Supprimer', ['class'=>'btn btn-danger'])}}
                            {!! Form::close() !!}
                        @endif
                        <a href="{{route('typeEnclos.show', $typeEnclos->id)}}" class="btn btn-primary">Modifier</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@stop
