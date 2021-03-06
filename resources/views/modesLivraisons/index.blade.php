@extends('layouts.admin')

@section('content')
    <div class="row col-6 offset-3">
        <h1>Liste des modes de livraison</h1>
        <a href="{{route('modesLivraisons.create')}}" class="btn btn-secondary col-2 offset-3">Create</a>
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
            @foreach($modesLivraisons as $modeLivraison)
                <tr>
                    <td>{{$modeLivraison->id}}</td>
                    <td>{{$modeLivraison->nom}}</td>
                    <td>{{$modeLivraison->commandes->count()}}</td>
                    <td>@if($modeLivraison->commandes->count()>0)
                            Ne peut pas être supprimer car des commandes sont associés
                        @else
                            {!! Form::open(['url'=>'admin/modesLivraisons/'.$modeLivraison->id,'method' => 'delete']) !!}
                            {{Form::submit('Supprimer', ['class'=>'btn btn-danger'])}}
                            {!! Form::close() !!}
                        @endif
                        <a href="{{route('modesLivraisons.show', $modeLivraison->id)}}" class="btn btn-primary">Modifier</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@stop
