@extends('layouts.admin')

@section('content')
    <div class="row col-6 offset-3">
        <h1>Liste des produits</h1>
        <a href="{{route('produits.create')}}" class="btn btn-secondary col-2 offset-3">Create</a>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Id</th>
                <th>Nom</th>
                <th>Prix</th>
                <th>Quantite</th>
                <th>Taux</th>
                <th>Categorie</th>
                <th>Nb dans des paniers</th>
                <th>Nb dans des commandes</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($produits as $produit)
                <tr>
                    <td>{{$produit->id}}</td>
                    <td>{{$produit->nom}}</td>
                    <td>{{$produit->prix}}</td>
                    <td>{{$produit->quantite}}</td>
                    <td>{{$produit->taxe->taux}}</td>
                    <td>{{$produit->category->nom}}</td>
                    <td>
                        {{$produit->clients->count()}}
                    </td>
                    <td>{{$produit->commandes->count()}}
                    </td>
                    <td>
                        <a href="{{route('produits.show', $produit->id)}}" class="btn btn-primary">Modifier</a>
                        @if($produit->commandes->count() <= 0 || $produit->clients->count() <= 0)
                        {!! Form::open(['url'=>'admin/produits/'.$produit->id,'method' => 'delete']) !!}
                        {{Form::submit('Supprimer', ['class'=>'btn btn-danger'])}}
                        {!! Form::close() !!}
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@stop
