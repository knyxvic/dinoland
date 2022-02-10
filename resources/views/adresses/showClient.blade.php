@extends('layouts.marketplace')

@section('content')
    <div class="container">
<div class="row">
    <h1>Modification adresse</h1>

    <div class="col-6 offset-3">
        {!! Form::open(['url'=>'client/adresse/'.$adresse->id, 'method'=>'PUT']) !!}
        <div class="form-group">
            <label for="">Rue</label>
            {{Form::text('rue', $adresse->rue, ['class'=>'form-control'])}}
            <span style="color:red">{{$errors->first('rue')}}</span>
        </div>
        <div class="form-group">
            <label for="">Code Postal</label>
            {{Form::text('cp', $adresse->cp, ['class'=>'form-control'])}}
            <span style="color:red">{{$errors->first('cp')}}</span>
        </div>
        <div class="form-group">
            <label for="">Ville</label>
            {{Form::text('ville', $adresse->ville, ['class'=>'form-control'])}}
            <span style="color:red">{{$errors->first('ville')}}</span>
        </div>
        <div class="form-group">
            <label for="pays_id">Pays</label>
            <select name="pays_id" id="" class="js-example-basic-single form-select">
                @foreach($pays as $t_pays)
                    @if($t_pays->id == $adresse->pays->id)
                        <option value="{{$t_pays->id}}" selected>{{$t_pays->nom}}</option>
                    @else
                        <option value="{{$t_pays->id}}">{{$t_pays->nom}}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="">Adresse de facturation par défaut</label>
            @if(\Illuminate\Support\Facades\Auth::guard('client')->user()->adresse_facturation_id == $adresse->id)
                <input type="checkbox" name="adresse_facturation" id="adresse_facturation" checked>
            @else
                <input type="checkbox" name="adresse_facturation" id="adresse_facturation" >
            @endif

        </div>
        <div class="form-group">
            <label for="">Adresse de livraison par défaut</label>
            @if(\Illuminate\Support\Facades\Auth::guard('client')->user()->adresse_livraison_id == $adresse->id)
                <input type="checkbox" name="adresse_livraison" id="adresse_livraison" checked>
            @else
                <input type="checkbox" name="adresse_livraison" id="adresse_livraison" >
            @endif
                <span style="color:red">{{$errors->first('ville')}}</span>
        </div>

        {{Form::hidden('client_id', \Illuminate\Support\Facades\Auth::guard('client')->user()->id, ['class'=>'form-control'])}}

        {{Form::submit('Valider', ['class'=>'btn btn-success'])}}
        {!! Form::close() !!}
    </div>
</div>
    </div>
@stop
