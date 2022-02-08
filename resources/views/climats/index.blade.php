@extends('layouts.admin')

@section('content')
    <div class="row col-6 offset-3">
        <h1>Liste des climats</h1>
        <a href="{{route('climats.create')}}" class="btn btn-secondary col-2 offset-3">Create</a>
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
            @foreach($climats as $climat)
                <tr>
                    <td>{{$climat->id}}</td>
                    <td>{{$climat->nom}}</td>
                    <td>{{$climat->enclos->count()}}</td>
                    <td>@if($climat->enclos->count()>0)
                            Ne peut pas être supprimer car des enclos sont associés
                        @else
                            {!! Form::open(['url'=>'admin/climats/'.$climat->id,'method' => 'delete']) !!}
                            {{Form::submit('Supprimer', ['class'=>'btn btn-danger'])}}
                            {!! Form::close() !!}
                        @endif
                        <a href="{{route('climats.show', $climat->id)}}" class="btn btn-primary">Modifier</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@stop
