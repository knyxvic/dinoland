@extends('layouts.admin')

@section('content')

    <div class="row">
        <h1>Climat : {{$climat->nom}}</h1>

        <div class="col-6 offset-3">
            {!! Form::open(['url'=>'admin/climats/'.$climat->id, 'method'=>'PUT']) !!}
            <div class="form-group">
                <label for="">Nom</label>
                {{Form::text('nom', $climat->nom, ['class'=>'form-control'])}}
                <span style="color:red">{{$errors->first('title')}}</span>
            </div>

            {{Form::submit('Valider', ['class'=>'btn btn-success'])}}
            {!! Form::close() !!}
        </div>
    </div>
@stop
