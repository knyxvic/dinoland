@extends('layouts.admin')

@section('content')
    <div class="row col-6 offset-3">
        <h1>Liste des statuts de commandes</h1>
        <a href="{{route('statutsCommandes.create')}}" class="btn btn-secondary col-2 offset-3">Create</a>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Id</th>
                <th>Nom</th>
                <th>Nb Commande attaché</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($statutsCommandes as $statutCommande)
                <tr>
                    <td>{{$statutCommande->id}}</td>
                    <td>{{$statutCommande->nom}}</td>
                    <td>{{$statutCommande->commandes->count()}}</td>
                    <td>@if($statutCommande->commandes->count()>0)
                            Ne peut pas être supprimer car des commandes sont associés
                        @else
                            {!! Form::open(['url'=>'admin/statutsCommandes/'.$statutCommande->id,'method' => 'delete']) !!}
                            {{Form::submit('Supprimer', ['class'=>'btn btn-danger'])}}
                            {!! Form::close() !!}
                        @endif
                        <a href="{{route('statutsCommandes.show', $statutCommande->id)}}" class="btn btn-primary">Modifier</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@stop
