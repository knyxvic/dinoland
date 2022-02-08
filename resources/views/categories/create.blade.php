@extends('layouts.admin')

@section('content')

    <div class="row">
        <h1>Création d'une catégorie</h1>

        <div class="col-6 offset-3">
            {!! Form::open(['url'=>'admin/categories']) !!}
            <div class="form-group">
                <label for="">Nom</label>
                {{Form::text('nom', null, ['class'=>'form-control'])}}
                <span style="color:red">{{$errors->first('title')}}</span>
            </div>

            {{Form::submit('Valider', ['class'=>'btn btn-success'])}}
            {!! Form::close() !!}
        </div>
    </div>
@stop
