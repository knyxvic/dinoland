@extends('layouts.admin')

@section('content')
    <div class="row col-6">
        <h1>Liste du personnels</h1>
        <a href="{{route('personnels.create')}}" class="btn btn-secondary col-2 offset-3">Create</a>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Id</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Tel</th>
                <th>Email</th>
                <th>Type Personnel</th>
                <th>Rue</th>
                <th>Cp</th>
                <th>Ville</th>
                <th>Pays</th>
                <th>Enclos</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($personnels as $personnel)

                <tr>
                    <td>{{$personnel->id}}</td>
                    <td>{{$personnel->nom}}</td>
                    <td>{{$personnel->prenom}}</td>
                    <td>{{$personnel->tel}}</td>
                    <td>{{$personnel->email}}</td>
                    <td>{{$personnel->typePersonnel->nom}}</td>
                    <td>{{$personnel->adresse->rue}}</td>
                    <td>{{$personnel->adresse->cp}}</td>
                    <td>{{$personnel->adresse->ville}}</td>
                    <td>{{$personnel->adresse->pays->nom}}</td>
                    <td>
                        @foreach($personnel->enclos as $enclos )
                            {{$enclos->nom}}
                            <br/>
                        @endforeach
                    </td>
                    <td>
                        <a href="{{route('personnels.show', $personnel->id)}}" class="btn btn-primary">Modifier</a>
                        {!! Form::open(['admin/url'=>'personnels/'.$personnel->id,'method' => 'delete']) !!}
                        {{Form::submit('Supprimer', ['class'=>'btn btn-danger'])}}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@stop


