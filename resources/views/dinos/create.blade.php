@extends('layouts.admin')

@section('content')

    <div class="row">
        <h1>Création d'une dinosaure</h1>
        <div class="col-6 offset-3">
            {!! Form::open(['url'=>'admin/dinos']) !!}
            <div class="form-group">
                <label for="">Nom</label>
                {{Form::text('nom', null, ['class'=>'form-control'])}}
                <span style="color:red">{{$errors->first('nom')}}</span>
            </div>
            <div class="form-group">
                <label for="taille">Taille</label>
                {{Form::text('taille', null, ['class'=>'form-control'])}}
                <span style="color:red">{{$errors->first('taille')}}</span>
            </div>
            <div class="form-group">
                <label for="">Poids</label>
                {{Form::text('poids', null, ['class'=>'form-control'])}}
                <span style="color:red">{{$errors->first('poids')}}</span>
            </div>

            <div class="form-group">
                <label for="espece_id">Espece</label>
                <select name="espece_id" id="" class="js-example-basic-single form-select">
                    @foreach($especes as $key => $espece)
                        <option value="{{$key}}">{{$espece}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="nourriture_id">Nourriture</label>
                {{Form::select('nourriture_id',$nourritures, ['class'=>'form-select'])}}
            </div>
            <div class="form-group">
                <label for="enclos_id">Enclos</label>
                {{Form::select('enclos_id',$enclos, ['class'=>'form-select'])}}
            </div>
            <div class="form-group">
                <label for="dateArrive">Date Arrive</label>
                <input type="date" id="dateArrive" name="dateArrive">
                <span style="color:red">{{$errors->first('dateArrive')}}</span>

            </div>
            <div class="form-group">
                <label for="">Caracteristiques</label>
                {{Form::select('caracteristiques_id[]', $caracteristiques, null,['class'=>'form-select form-select-lg mb-3','multiple'])}}
            </div>
            {{Form::submit('Valider', ['class'=>'btn btn-success'])}}
            {!! Form::close() !!}
        </div>
    </div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>$(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
</script>
@stop
