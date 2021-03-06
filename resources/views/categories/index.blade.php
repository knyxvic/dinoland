@extends('layouts.admin')

@section('content')
    <div class="row col-6 offset-3">
        <h1>Liste des categories</h1>
        <a href="{{route('categories.create')}}" class="btn btn-secondary col-2 offset-3">Create</a>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Id</th>
                <th>Nom</th>
                <th>Nb Produits attaché</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $categorie)
                <tr>
                    <td>{{$categorie->id}}</td>
                    <td>{{$categorie->nom}}</td>
                    <td>{{$categorie->produits->count()}}</td>
                    <td>@if($categorie->produits->count()>0)
                            Ne peut pas être supprimer car des produits sont associés
                        @else
                            {!! Form::open(['url'=>'admin/categories/'.$categorie->id,'method' => 'delete']) !!}
                            {{Form::submit('Supprimer', ['class'=>'btn btn-danger'])}}
                            {!! Form::close() !!}
                        @endif
                        <a href="{{route('categories.show', $categorie->id)}}" class="btn btn-primary">Modifier</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    @stop
