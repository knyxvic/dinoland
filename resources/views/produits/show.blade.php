@extends('layouts.admin')

@section('content')
    <div class="row">
        <h1>Produit : {{$produit->nom}}</h1>

        <div class="col-6">
            {!! Form::open(['url'=>'admin/produits/'.$produit->id, 'method'=>'PUT']) !!}
            <div class="form-group">
                <label for="">Nom</label>
                {{Form::text('nom', $produit->nom, ['class'=>'form-control'])}}
                <span style="color:red">{{$errors->first('nom')}}</span>
            </div>
            <div class="form-group">
                <label for="prix">Prix</label>
                {{Form::text('prix', $produit->prix, ['class'=>'form-control'])}}
                <span style="color:red">{{$errors->first('prix')}}</span>
            </div>
            <div class="form-group">
                <label for="">Quantite</label>
                {{Form::text('quantite', $produit->quantite, ['class'=>'form-control'])}}
                <span style="color:red">{{$errors->first('quantite')}}</span>
            </div>
            <div class="form-group">
                <label for="taxe_id">Taxe</label>
                <select name="taxe_id" id="" class="js-example-basic-single form-select">
                    @foreach($taxes as $taxe)
                        @if($taxe->id == $produit->taxe->id)
                            <option value="{{$taxe->id}}" selected>{{$taxe->nom}}</option>
                        @else
                        <option value="{{$taxe->id}}">{{$taxe->nom}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="category_id">Category</label>
                <select name="category_id" id="" class="js-example-basic-single form-select">
                    @foreach($categories as $category)
                        @if($category->id == $produit->category->id)
                            <option value="{{$category->id}}" selected>{{$category->nom}}</option>
                        @else
                            <option value="{{$category->id}}">{{$category->nom}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            {{Form::submit('Valider', ['class'=>'btn btn-success'])}}
            {!! Form::close() !!}
        </div>
    </div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
    });
</script>
@stop



