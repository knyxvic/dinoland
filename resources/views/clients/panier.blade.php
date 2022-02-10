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
                            <td>
                                {!! Form::open(['url'=>'client/panier/'.$produit->id, 'method'=>'delete']) !!}
                                {{Form::submit('Supprimer', ['class'=>'btn btn-danger'])}}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <strong>Total commande : {{$panier->total}} € </strong>
            <div class="">
                {!! Form::open(['url'=>'client/panier/valider', 'method'=>'post']) !!}
                <div class="form-group">
                    <label for="adresse_livraison">Adresse de livraison</label>
                    <select name="adresse_livraison" id="" class="js-example-basic-single form-select">
                    @foreach($client->adresses as $adresse)
                            @if($adresse->id == \Illuminate\Support\Facades\Auth::guard('client')->user()->adresse_livraison_id)
                                <option value="{{$adresse->id}}" selected>{{$adresse->rue}} {{$adresse->cp}} {{$adresse->ville}}</option>
                            @else
                                <option value="{{$adresse->id}}">{{$adresse->rue}} {{$adresse->cp}} {{$adresse->ville}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="adresse_facturation">Adresse de facturation</label>
                    <select name="adresse_facturation" id="" class="js-example-basic-single form-select">
                    @foreach($client->adresses as $adresse)
                        @if($adresse->id == \Illuminate\Support\Facades\Auth::guard('client')->user()->adresse_facturation_id)
                            <option value="{{$adresse->id}}" selected>{{$adresse->rue}} {{$adresse->cp}} {{$adresse->ville}}</option>
                        @else
                            <option value="{{$adresse->id}}">{{$adresse->rue}} {{$adresse->cp}} {{$adresse->ville}}</option>
                        @endif
                    @endforeach
                    </select>
                </div>

                {{Form::submit('Valider', ['class'=>'btn btn-success'])}}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop
