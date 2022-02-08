@extends('layouts.admin')

@section('content')

    <div class="row">
        <h1>Mode Livraison : {{$modeLivraison->nom}}</h1>

        <div class="col-6 offset-3">
            {!! Form::open(['url'=>'admin/modesLivraisons/'.$modeLivraison->id, 'method'=>'PUT']) !!}
            <div class="form-group">
                <label for="">Nom</label>
                {{Form::text('nom', $modeLivraison->nom, ['class'=>'form-control'])}}
                <span style="color:red">{{$errors->first('title')}}</span>
            </div>

            {{Form::submit('Valider', ['class'=>'btn btn-success'])}}
            {!! Form::close() !!}
        </div>
    </div>
@stop
