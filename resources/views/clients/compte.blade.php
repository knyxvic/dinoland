@extends('layouts.marketplace')

@section('content')
    <div class="row">
        <div class="accordion accordion-flush" id="accordionFlushExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                        Mes Adresses
                    </button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <a href="{{route('createClient')}}">Créer une nouvelle adresse</a>
                        <div class="row">
                        @foreach($client->adresses as $adresse)
                            <div class="card" style="width: 25rem;margin:1%">
                                <div class="card-body">
                                    <h5 class="card-title">{{$adresse->rue}} {{$adresse->cp}} {{$adresse->ville}} {{$adresse->pays->nom}}</h5>
                                    <a href="{{route('adresse.detail',['id'=>$adresse->id])}}" class="btn btn-primary">Modifier l'adresse</a>
                                    <a href="" class="btn btn-danger">Supprimer l'adresse</a>
                                </div>
                            </div>
                        @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                        Mes Commandes
                    </button>
                </h2>
                <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <div class="row">
                        @foreach($client->commandes as $commande)
                            <div class="card" style="width: 25rem;margin:1%">
                                <div class="card-body">
                                    <h5 class="card-title">Commande numéro : {{$commande->id}}</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">Prix : {{$commande->prixTTC}} €</h6>
                                    <p class="card-text"><strong>Adresse Livraison </strong>: {{$commande->adresse_livraison}}</p>
                                    <p class="card-text"><strong>Adresse Facturation </strong>: {{$commande->adresse_facturation}}</p>
                                    <a href="{{route('commande.detail',['id'=>$commande->id])}}" class="card-link">Voir la commande</a>
                                </div>
                            </div>
                        @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
