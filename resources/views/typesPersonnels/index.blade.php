@extends('layouts.admin')

@section('content')
    <div class="row col-6 offset-3">
        <h1>Liste des types de personnel</h1>
        <a href="{{route('typesPersonnels.create')}}" class="btn btn-secondary col-2 offset-3">Create</a>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Id</th>
                <th>Nom</th>
                <th>Nb Personnels attaché</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($typesPersonnels as $typePersonnels)
                <tr>
                    <td>{{$typePersonnels->id}}</td>
                    <td>{{$typePersonnels->nom}}</td>
                    <td>{{$typePersonnels->personnels->count()}}</td>
                    <td>@if($typePersonnels->personnels->count()>0)
                            Ne peut pas être supprimer car des enclos sont associés
                        @else
                            {!! Form::open(['url'=>'admin/typesPersonnels/'.$typePersonnels->id,'method' => 'delete']) !!}
                            {{Form::submit('Supprimer', ['class'=>'btn btn-danger'])}}
                            {!! Form::close() !!}
                        @endif
                        <a href="{{route('typesPersonnels.show', $typePersonnels->id)}}" class="btn btn-primary">Modifier</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@stop
