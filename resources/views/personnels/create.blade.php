@extends('layouts.admin')

@section('content')

    <div class="row">
        <h1>Création d'un personnel</h1>

        <div class="col-6 offset-3">
            {!! Form::open(['url'=>'admin/personnels/', 'method'=>'POST']) !!}
            <div class="form-group">
                <label for="">Nom</label>
                {{Form::text('nom', null, ['class'=>'form-control'])}}
                <span style="color:red">{{$errors->first('title')}}</span>
            </div>
            <div class="form-group">
                <label for="">Prenom</label>
                {{Form::text('prenom', null, ['class'=>'form-control'])}}
                <span style="color:red">{{$errors->first('title')}}</span>
            </div>
            <div class="form-group">
                <label for="tel">Tel</label>
                {{Form::text('tel', null, ['class'=>'form-control'])}}
                <span style="color:red">{{$errors->first('taille')}}</span>
            </div>
            <div class="form-group">
                <label for="">email</label>
                {{Form::email('email', null, ['class'=>'form-control'])}}
                <span style="color:red">{{$errors->first('title')}}</span>
            </div>
            <div class="form-group">
                <label for="">Rue</label>
                {{Form::text('rue', null, ['class'=>'form-control'])}}
                <span style="color:red">{{$errors->first('title')}}</span>
            </div>
            <div class="form-group">
                <label for="">Cp</label>
                {{Form::text('cp', null, ['class'=>'form-control'])}}
                <span style="color:red">{{$errors->first('title')}}</span>
            </div>
            <div class="form-group">
                <label for="">Ville</label>
                {{Form::text('ville', null, ['class'=>'form-control'])}}
                <span style="color:red">{{$errors->first('title')}}</span>
            </div>
            <div class="form-group">
                <label for="pays">Pays</label>

                <select name="pays_id" id="" class="js-example-basic-single form-select">

                    @foreach($pays as $t_pays)
                        <option value="{{$t_pays->id}}">{{$t_pays->nom}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="type_personnel_id">Type Personnel</label>

                <select name="type_personnel_id" id="" class="js-example-basic-single form-select">

                    @foreach($typesPersonnels as $typePersonnel)
                            <option value="{{$typePersonnel->id}}">{{$typePersonnel->nom}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="">Enclos</label>
                <select name="enclos_id[]" id="enclos" class=" form-select js-example-basic-multiple" multiple>
                    @foreach($enclos as $enclo)
                            <option value="{{$enclo->id}}">{{$enclo->nom}}</option>
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
<script src="{{mix("js/app.js")}}"></script>
<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
    });
</script>
@stop



