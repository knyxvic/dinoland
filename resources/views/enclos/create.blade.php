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
        <h1>Création d'un enclos</h1>

        <div class="col-6">
            {!! Form::open(['url'=>'admin/enclos/', 'method'=>'POST']) !!}
            <div class="form-group">
                <label for="">Nom</label>
                {{Form::text('nom', null, ['class'=>'form-control'])}}
                <span style="color:red">{{$errors->first('title')}}</span>
            </div>
            <div class="form-group">
                <label for="superficie">Superficie</label>
                {{Form::text('superficie', null, ['class'=>'form-control'])}}
                <span style="color:red">{{$errors->first('taille')}}</span>
            </div>
            <div class="form-group">
                <label for="type_enclos_id">Type Enclos</label>

                <select name="type_enclos_id" id="" class="js-example-basic-single form-select">

                    @foreach($typesEnclos as $key => $typeEnclos)
                            <option value="{{$typeEnclos->id}}">{{$typeEnclos->nom}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="climat_id">Climat</label>

                <select name="climat_id" id="" class="js-example-basic-single form-select">

                    @foreach($climats as $climat)
                            <option value="{{$climat->id}}">{{$climat->nom}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Environnements</label>
                <select name="environnements_id[]" id="environnements" class=" form-select js-example-basic-multiple" multiple>
                    @foreach($environnements as $environnement)
                            <option value="{{$environnement->id}}">{{$environnement->nom}}</option>
                    @endforeach
                </select>
            </div>
            <!-- TODO: environnement -> superficie -->
            <div class="form-group">
                <label for="">Personnels</label>
                <select name="personnels_id[]" id="" class=" form-select js-example-basic-multiple" multiple>
                    @foreach($personnels as $personnel)
                            <option value="{{$personnel->id}}">{{$personnel->nom}}</option>
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
                    <th>Id enclos</th>
                    <th>nom enclos</th>
                    <th>Date Arrivée</th>
                    <th>Date Sortie</th>
                </tr>
                </thead>
                <tbody>

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



