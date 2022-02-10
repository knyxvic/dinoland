@extends('layouts.marketplace')

@section('content')
    <div class="container">
        <div class="row">
            <h1>Création d'une adresse</h1>

            <div class="col-6 offset-3">
                {!! Form::open(['url'=>'client/adresse/', 'method'=>'POST']) !!}
                <div class="form-group">
                    <label for="">Rue</label>
                    {{Form::text('rue', null, ['class'=>'form-control'])}}
                    <span style="color:red">{{$errors->first('rue')}}</span>
                </div>
                <div class="form-group">
                    <label for="">Code Postal</label>
                    {{Form::text('cp', null, ['class'=>'form-control'])}}
                    <span style="color:red">{{$errors->first('cp')}}</span>
                </div>
                <div class="form-group">
                    <label for="">Ville</label>
                    {{Form::text('ville', null, ['class'=>'form-control'])}}
                    <span style="color:red">{{$errors->first('ville')}}</span>
                </div>
                <div class="form-group">
                    <label for="pays_id">Pays</label>
                    <select name="pays_id" id="" class="js-example-basic-single form-select">
                        @foreach($pays as $t_pays)

                            <option value="{{$t_pays->id}}">{{$t_pays->nom}}</option>

                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Adresse de facturation par défaut</label>
                     <input type="checkbox" name="adresse_facturation" id="adresse_facturation" >


                </div>
                <div class="form-group">
                    <label for="">Adresse de livraison par défaut</label>

                    <input type="checkbox" name="adresse_livraison" id="adresse_livraison" >
                    <span style="color:red">{{$errors->first('ville')}}</span>
                </div>
                {{Form::hidden('client_id', \Illuminate\Support\Facades\Auth::guard('client')->user()->id, ['class'=>'form-control'])}}
                {{Form::submit('Valider', ['class'=>'btn btn-success'])}}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    @stop
