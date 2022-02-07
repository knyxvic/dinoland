<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<div class="container">
    <div class="row col-6 offset-3">
        <h1>Liste des pays</h1>
        <a href="{{route('pays.create')}}" class="btn btn-secondary col-2 offset-3">Create</a>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Id</th>
                <th>Nom</th>
                <th>Nb Adresse attaché</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($pays as $t_pays)
                <tr>
                    <td>{{$t_pays->id}}</td>
                    <td>{{$t_pays->nom}}</td>
                    <td>{{$t_pays->adresses->count()}}</td>
                    <td>@if($t_pays->adresses->count()>0)
                            Ne peut pas être supprimer car des adresses sont associés
                        @else
                            {!! Form::open(['url'=>'pays/'.$t_pays->id,'method' => 'delete']) !!}
                            {{Form::submit('Supprimer', ['class'=>'btn btn-danger'])}}
                            {!! Form::close() !!}
                        @endif
                        <a href="{{route('pays.show', $t_pays->id)}}" class="btn btn-primary">Modifier</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
