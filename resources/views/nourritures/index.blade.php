@extends('layouts.admin')

@section('content')
    <div class="row col-6 offset-3">
        <h1>Liste des nourritures</h1>
        <a href="{{route('nourritures.create')}}" class="btn btn-secondary col-2 offset-3">Create</a>
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
            @foreach($nourritures as $nourriture)
                <tr>
                    <td>{{$nourriture->id}}</td>
                    <td>{{$nourriture->nom}}</td>
                    <td>{{$nourriture->dinos->count()}}</td>
                    <td>@if($nourriture->dinos->count()>0)
                            Ne peut pas être supprimer car des dinos sont associés
                        @else
                            {!! Form::open(['url'=>'admin/nourritures/'.$nourriture->id,'method' => 'delete']) !!}
                            {{Form::submit('Supprimer', ['class'=>'btn btn-danger'])}}
                            {!! Form::close() !!}
                        @endif
                        <a href="{{route('nourritures.show', $nourriture->id)}}" class="btn btn-primary">Modifier</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@stop
