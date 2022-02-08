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
        <h1>Enclos : {{$enclos->nom}}</h1>

        <div class="col-6">
            {!! Form::open(['url'=>'admin/enclos/'.$enclos->id, 'method'=>'PUT']) !!}
            <div class="form-group">
                <label for="">Nom</label>
                {{Form::text('nom', $enclos->nom, ['class'=>'form-control'])}}
                <span style="color:red">{{$errors->first('title')}}</span>
            </div>
            <div class="form-group">
                <label for="taille">Superficie</label>
                {{Form::text('superficie', $enclos->superficie, ['class'=>'form-control'])}}
                <span style="color:red">{{$errors->first('taille')}}</span>
            </div>
            <div class="form-group">
                <label for="type_enclos_id">Type Enclos</label>

                <select name="type_enclos_id" id="" class="js-example-basic-single form-select">

                    @foreach($typesEnclos as $key => $typeEnclos)
                        @if($typeEnclos->id == $enclos->typeEnclos->id)
                            <option value="{{$typeEnclos->id}}" selected>{{$typeEnclos->nom}}</option>
                        @else
                            <option value="{{$typeEnclos->id}}">{{$typeEnclos->nom}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="climat_id">Climat</label>

                <select name="climat_id" id="" class="js-example-basic-single form-select">

                    @foreach($climats as $climat)
                        @if($climat->id == $enclos->climat->id)
                            <option value="{{$climat->id}}" selected>{{$climat->nom}}</option>
                        @else
                            <option value="{{$climat->id}}">{{$climat->nom}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Environnements</label>
                <select name="environnements_id[]" id="environnements" class=" form-select js-example-basic-multiple" multiple>
                    @foreach($environnements as $environnement)
                        @if($environnement->active)
                            <option value="{{$environnement->id}}" selected>{{$environnement->nom}}</option>
                        @else
                            <option value="{{$environnement->id}}">{{$environnement->nom}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <!-- TODO: environnement -> superficie -->
            <div class="form-group">
                <label for="">Personnels</label>
                <select name="personnels_id[]" id="" class=" form-select js-example-basic-multiple" multiple>
                    @foreach($personnels as $personnel)
                        @if($personnel->active)
                            <option value="{{$personnel->id}}" selected>{{$personnel->nom}}</option>
                        @else
                            <option value="{{$personnel->id}}">{{$personnel->nom}}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            {{Form::submit('Valider', ['class'=>'btn btn-success'])}}
            {!! Form::close() !!}
        </div>
        <div class="col-6">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id dinos</th>
                        <th>nom dinos</th>
                        <th>Date Arrivée</th>
                        <th>Date Sortie</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($enclos->dinos as $dino)
                    <tr>
                        <td><a href="{{route('dinos.show', $dino->id)}}" class="btn btn-primary">{{$dino->id}}</a></td>
                        <td>{{$dino->nom}}</td>
                        <td>{{$dino->pivot->dateArrive}}</td>
                        <td>{{$dino->pivot->dateSortie}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
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



