@extends('layouts.marketplace')

@section('content')
    <div class="container">
        <div class="row">

                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Quantite</th>
                        <th>Prix TTC Unitaire</th>
                        <th>Prix TTC</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($panier->produits as $produit)
                        <tr>
                            <td>{{$produit->nom}}</td>
                            <td>{{$produit->pivot->quantite}}</td>
                            <td>{{$produit->prix * $produit->taxe->taux}} €</td>
                            <td>
                                {{$produit->prix * $produit->taxe->taux * $produit->pivot->quantite}} €
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <strong>Total commande : {{$panier->total}} € </strong>
        </div>
    </div>
@stop
