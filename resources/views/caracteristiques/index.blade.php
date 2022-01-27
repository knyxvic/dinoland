<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<div class="container">
    <div class="row col-6 offset-3">
        <h1>Liste des caracteristiques</h1>
        <a href="{{route('caracteristiques.create')}}" class="btn btn-secondary col-2 offset-3">Create</a>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Id</th>
                <th>Nom</th>
                <th>Nb Dinos attaché</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($caracteristiques as $caracteristique)
                <tr>
                    <td>{{$caracteristique->id}}</td>
                    <td>{{$caracteristique->nom}}</td>
                    <td>{{$caracteristique->dinos->count()}}</td>
                    <td>
                        @if($caracteristique->dinos->count()>0)
                            Ne peut pas être supprimer car des dinosaures sont associés
                        @else
                        {!! Form::open(['url'=>'caracteristiques/'.$caracteristique->id,'method' => 'delete']) !!}
                        {{Form::submit('Supprimer', ['class'=>'btn btn-danger'])}}
                        {!! Form::close() !!}
                        @endif
                        <a href="{{route('caracteristiques.show', $caracteristique->id)}}" class="btn btn-primary">Modifier</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>