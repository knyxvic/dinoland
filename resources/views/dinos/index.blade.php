@extends('layouts.admin')

@section('content')
    <div class="row col-6 offset-3">
        <h1>Liste des dinos</h1>
        <a href="{{route('dinos.create')}}" class="btn btn-secondary col-2 offset-3">Create</a>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Id</th>
                <th>Nom</th>
                <th>Espece</th>
                <th>Nourriture</th>
                <th>Taille</th>
                <th>Poids</th>
                <th>Enclos</th>
                <th>Caracteristiques</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($dinos as $dino)

                <tr>
                    <td>{{$dino->id}}</td>
                    <td>{{$dino->nom}}</td>
                    <td>{{$dino->espece->nom}}</td>
                    <td>{{$dino->nourriture->nom}}</td>
                    <td>{{$dino->taille}}</td>
                    <td>{{$dino->poids}}</td>
                    <td>
                        @if($dino->enclos->isNotEmpty())
                        {{$dino->enclos->last()->nom}}
                        @endif
                    </td>
                    <td>@foreach($dino->caracteristiques as $caracteristique )
                            {{$caracteristique->nom}}
                            <br/>
                        @endforeach
                    </td>
                    <td>
                        <a href="{{route('dinos.show', $dino->id)}}" class="btn btn-primary">Modifier</a>
                        {!! Form::open(['url'=>'admin/dinos/'.$dino->id,'method' => 'delete']) !!}
                        {{Form::submit('Supprimer', ['class'=>'btn btn-danger'])}}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@stop
