<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<div class="container">
    <div class="row col-6 offset-3">
        <h1>Liste des enclos</h1>
        <a href="{{route('enclos.create')}}" class="btn btn-secondary col-2 offset-3">Create</a>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Id</th>
                <th>Nom</th>
                <th>Superficie</th>
                <th>Type Enclos</th>
                <th>Climat</th>
                <th>Personnels</th>
                <th>Environnements</th>
                <th>Nb Dinos</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($enclos as $enclo)

                <tr>
                    <td>{{$enclo->id}}</td>
                    <td>{{$enclo->nom}}</td>
                    <td>{{$enclo->superficie}}</td>
                    <td>{{$enclo->typeEnclos->nom}}</td>
                    <td>{{$enclo->climat->nom}}</td>
                    <td>
                        @foreach($enclo->personnels as $personnel )
                            {{$personnel->nom}}  {{$personnel->prenom}}
                            <br/>
                        @endforeach
                    </td>
                    <td>
                        @foreach($enclo->environnements as $environnement )
                            {{$environnement->nom}}
                            <br/>
                        @endforeach
                    </td>
                    <td>
                        {{$enclo->dinos()->wherePivotNull('dateSortie')->count()}}
                    </td>
                    <td>
                        <a href="{{route('enclos.show', $enclo->id)}}" class="btn btn-primary">Modifier</a>
                        {!! Form::open(['url'=>'enclos/'.$enclo->id,'method' => 'delete']) !!}
                        {{Form::submit('Supprimer', ['class'=>'btn btn-danger'])}}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>


