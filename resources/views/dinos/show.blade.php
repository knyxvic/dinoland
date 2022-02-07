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
        <h1>Dino : {{$dino->nom}}</h1>

        <div class="col-6">
            {!! Form::open(['url'=>'dinos/'.$dino->id, 'method'=>'PUT']) !!}
            <div class="form-group">
                <label for="">Nom</label>
                {{Form::text('nom', $dino->nom, ['class'=>'form-control'])}}
                <span style="color:red">{{$errors->first('title')}}</span>
            </div>
            <div class="form-group">
                <label for="taille">Taille</label>
                {{Form::text('taille', $dino->taille, ['class'=>'form-control'])}}
                <span style="color:red">{{$errors->first('taille')}}</span>
            </div>
            <div class="form-group">
                <label for="">Poids</label>
                {{Form::text('poids', $dino->poids, ['class'=>'form-control'])}}
                <span style="color:red">{{$errors->first('poids')}}</span>
            </div>
            <div class="form-group">
                <label for="espece_id">Espece</label>
                <select name="espece_id" id="" class="js-example-basic-single form-select">
                    @foreach($especes as $key => $espece)
                        @if($espece->id == $dino->espece->id)
                            <option value="{{$espece->id}}" selected>{{$espece->nom}}</option>
                        @else
                        <option value="{{$espece->id}}">{{$espece->nom}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="nourriture_id">Nourriture</label>
                <select name="nourriture_id" id="" class=" form-select">
                    @foreach($nourritures as $key => $nourriture)
                        @if($nourriture->id == $dino->nourriture->id)
                            <option value="{{$nourriture->id}}" selected>{{$nourriture->nom}}</option>
                        @else
                            <option value="{{$nourriture->id}}">{{$nourriture->nom}}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="enclos_id">Enclos</label>


                <select name="enclos_id" id="" class=" form-select" >
                    @foreach($enclos as $enclo)
                        @if($dino->enclos->isNotEmpty())
                            @if($dino->enclos->last()->id == $enclo->id)
                                <option value="{{$enclo->id}}" selected>{{$enclo->nom}}</option>
                            @else
                                <option value="{{$enclo->id}}">{{$enclo->nom}}</option>
                            @endif
                        @else
                            <option value="{{$enclo->id}}">{{$enclo->nom}}</option>
                        @endif
                    @endforeach
                </select>
                @if($dino->enclos->isNotEmpty())
                    <div>Dans cette enclos depuis {{$dino->enclos->last()->pivot->dateArrive}}</div>
                @endif
            </div>
            <div class="form-group">
                <label for="">Caracteristiques</label>
                <select name="caracteristiques_id[]" id="" class="form-select js-example-basic-multiple" multiple>
                    @foreach($caracteristiques as $caracteristique)
                        @if($caracteristique->active)
                            <option value="{{$caracteristique->id}}" selected>{{$caracteristique->nom}}</option>
                        @else
                            <option value="{{$caracteristique->id}}">{{$caracteristique->nom}}</option>
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
                        <th>Id enclos</th>
                        <th>nom enclos</th>
                        <th>Date Arrivée</th>
                        <th>Date Sortie</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($dino->enclos as $enclos)
                    <tr>
                        <td>{{$enclos->id}}</td>
                        <td>{{$enclos->nom}}</td>
                        <td>{{$enclos->pivot->dateArrive}}</td>
                        <td>{{$enclos->pivot->dateSortie}}</td>
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



