<?php

namespace App\Http\Controllers;

use App\Http\Requests\DinoRequest;
use App\Models\Caracteristique;
use App\Models\Dino;
use App\Models\Espece;
use App\Models\Enclos;
use App\Models\Nourriture;
use Illuminate\Http\Request;

class DinoController extends Controller
{
    public function index(){
        $dinos = Dino::select('id', 'nom', 'taille','poids', 'espece_id', 'nourriture_id')->with(['espece:id,nom','nourriture:id,nom','caracteristiques:id,nom','enclos:id,nom,superficie'])->get();
        return view('dinos.index', ['dinos'=>$dinos]);
    }

    public function show($id){
        $dino = Dino::select('id', 'nom', 'taille','poids','espece_id', 'nourriture_id')->with(['espece:id,nom','nourriture:id,nom','caracteristiques:id,nom','enclos:id,nom,superficie'])->where('id',$id)->first();
        $nourritures = Nourriture::select('id','nom')->get();
        $especes = Espece::select('id','nom')->get();
        $enclos = Enclos::select('id','nom')->get();
        $caracteristiques = Caracteristique::select('id','nom')->get();

        foreach ($dino->caracteristiques as $caracteristique) {

            if($caracteristiques->contains($caracteristique)){
                $caracteristique = $caracteristiques->where('id',$caracteristique->id)->first();
                $caracteristique->active = true;
            }
        }

        return view('dinos.show',['dino'=>$dino, 'nourritures'=>$nourritures, 'especes'=>$especes,'enclos'=>$enclos,'caracteristiques'=>$caracteristiques]);
    }

    public function create(){
        $nourritures = Nourriture::select('id','nom')->pluck('nom','id');
        $especes = Espece::select('id','nom')->get()->pluck('nom','id');
        $enclos = Enclos::select('id','nom')->get()->pluck('nom','id');
        $caracteristiques = Caracteristique::select('id','nom')->get()->pluck('nom','id');
        return view('dinos.create',['nourritures'=>$nourritures,'especes'=>$especes,'enclos'=>$enclos,'caracteristiques'=>$caracteristiques]);
    }

    public function store(DinoRequest $request){
        $dino = Dino::create($request->all());
        $dino->enclos()->sync($request->enclos_id);
        $dino->caracteristiques()->sync($request->caracteristiques_id);
        return redirect()->route('dinos.index');
    }

    public function destroy($id){
        $dino = Dino::find($id);
        $dino->caracteristiques()->sync([]);
        $dino->enclos()->sync([]);
        if ($dino->delete()) {
            return redirect()->route('dinos.index');
        }
    }

    public function update(DinoRequest $request, Dino $dino){
        $dino->update($request->all());
        $dino->caracteristiques()->sync($request->caracteristiques_id);
        if($dino->enclos->isNotEmpty()){
            $dino->enclos()->updateExistingPivot($dino->enclos->last()->id, ['dateSortie'=> now()]);
        }
        $dino->enclos()->attach($request->enclos_id, ['dateArrive'=> now()]);

        $dino->save();
        return redirect()->route('dinos.index');

    }

}
