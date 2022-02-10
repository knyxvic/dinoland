@extends('layouts.marketplace')

@section('content')
    <div class="container">
<div class="row">
    <div class="card" style="width: 100%;margin:1%">
        <div class="card-body row">
            <div class="col-6">
                <h5 class="card-title">Commande numéro : {{$commande->id}}</h5>
                <h6 class="card-subtitle mb-2 text-muted">Prix : {{$commande->prixTTC}} €</h6>
            </div>
            <div class="col-6">
                <p class="card-text"><strong>Adresse Livraison </strong>: {{$commande->adresse_livraison}}</p>
                <p class="card-text"><strong>Adresse Facturation </strong>: {{$commande->adresse_facturation}}</p>
            </div>
        </div>
        <hr>
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
            @foreach($commande->produits as $produit)
                <tr>
                    <td>{{$produit->nom}}</td>
                    <td>{{$produit->pivot->quantite}}</td>
                    <td>{{$produit->pivot->prixHT * $produit->pivot->taux}} €</td>
                    <td>
                        {{$produit->pivot->prixHT * $produit->pivot->taux * $produit->pivot->quantite}} €
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <strong>Total commande : {{$commande->prixTTC}} € </strong>
    </div>
</div>
    </div>
@stop
