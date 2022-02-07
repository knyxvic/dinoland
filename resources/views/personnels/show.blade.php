<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create Post</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
<div class="container">

    <div class="row">
        <h1>Personnel : {{$personnel->nom}} {{$personnel->prenom}}</h1>

        <div class="col-6">
            {!! Form::open(['url'=>'personnels/'.$personnel->id, 'method'=>'PUT']) !!}
            <div class="form-group">
                <label for="">Nom</label>
                {{Form::text('nom', $personnel->nom, ['class'=>'form-control'])}}
                <span style="color:red">{{$errors->first('title')}}</span>
            </div>
            <div class="form-group">
                <label for="prenom">Prenom</label>
                {{Form::text('prenom', $personnel->prenom, ['class'=>'form-control'])}}
                <span style="color:red">{{$errors->first('taille')}}</span>
            </div>
            <div class="form-group">
                <label for="tel">Tel</label>
                {{Form::text('tel', $personnel->tel, ['class'=>'form-control'])}}
                <span style="color:red">{{$errors->first('taille')}}</span>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                {{Form::email('email', $personnel->email, ['class'=>'form-control'])}}
                <span style="color:red">{{$errors->first('taille')}}</span>
            </div>

           <!-- TODO: modifier adresse -> new page ? -->


            <div class="form-group">
                <label for="type_personnel_id">Type Personnel</label>

                <select name="type_personnel_id" id="" class="js-example-basic-single form-select">

                    @foreach($typesPersonnels as $typePersonnel)
                        @if($typePersonnel->id == $personnel->typePersonnel->id)
                            <option value="{{$typePersonnel->id}}" selected>{{$typePersonnel->nom}}</option>

                        @else
                            <option value="{{$typePersonnel->id}}">{{$typePersonnel->nom}}</option>

                        @endif
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="">Enclos</label>
                <select name="enclos_id[]" id="enclos" class=" form-select js-example-basic-multiple" multiple>
                    @foreach($enclos as $enclo)
                        @if($enclo->active)
                            <option value="{{$enclo->id}}" selected>{{$enclo->nom}}</option>

                        @else
                            <option value="{{$enclo->id}}">{{$enclo->nom}}</option>

                        @endif
                    @endforeach
                </select>
            </div>





            {{Form::submit('Valider', ['class'=>'btn btn-success'])}}
            {!! Form::close() !!}
        </div>
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
</body>
</html>



