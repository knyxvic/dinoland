<?php

namespace App\Http\Controllers;

use App\Http\Requests\EnclosRequest;
use App\Models\Climat;
use App\Models\Personnel;
use App\Models\TypeEnclos;
use App\Models\Environnement;
use Illuminate\Http\Request;

use App\Models\Enclos;

class EnclosController extends Controller
{
    public function index(){
        $enclos = Enclos::select('id', 'nom', 'superficie','type_enclos_id', 'climat_id')->with(['typeEnclos:id,nom','climat:id,nom','environnements:id,nom'])->get();
        return view('enclos.index', ['enclos'=>$enclos]);
    }

    public function show($id){
        $enclos = Enclos::select('id', 'nom', 'superficie','type_enclos_id', 'climat_id')->with(['dinos:id,nom','typeEnclos:id,nom','climat:id,nom','environnements:id,nom','dinos:id,nom'])->where('id',$id)->first();
        $typesEnclos = TypeEnclos::select('id', 'nom')->get();
        $climats = Climat::select('id', 'nom')->get();
        $environnements = Environnement::select('id', 'nom')->get();
        $personnels = Personnel::select('id', 'nom')->get();

        foreach ($enclos->environnements as $envi) {

            if($environnements->contains($envi)){
                $environnement = $environnements->where('id',$envi->id)->first();
                $environnement->active = true;
            }
        }

        foreach ($enclos->personnels as $perso) {

            if($personnels->contains($perso)){
                $personnel = $personnels->where('id',$perso->id)->first();
                $personnel->active = true;
            }
        }

        return view('enclos.show',['enclos'=>$enclos,'typesEnclos'=>$typesEnclos, 'climats'=>$climats, 'environnements'=>$environnements, 'personnels'=>$personnels]);
    }

    public function create(){
        $typesEnclos = TypeEnclos::select('id', 'nom')->get();
        $climats = Climat::select('id', 'nom')->get();
        $environnements = Environnement::select('id', 'nom')->get();
        $personnels = Personnel::select('id', 'nom')->get();
        return view('enclos.create',['typesEnclos'=>$typesEnclos, 'climats'=>$climats, 'environnements'=>$environnements, 'personnels'=>$personnels]);
    }

    public function store(EnclosRequest $request){
        $enclos = Enclos::create($request->all());
        $enclos->environnements()->sync($request->environnements_id);
        $enclos->personnels()->sync($request->personnels_id);
        $enclos->save();
        return redirect()->route('enclos.index');
    }

    public function destroy($id){
        $enclos = Enclos::find($id);
        $enclos->environnements()->sync([]);
        $enclos->personnels()->sync([]);
        $enclos->dinos()->sync([]);
        if ($enclos->delete()) {
            return redirect()->route('enclos.index');
        }
    }

    public function update(EnclosRequest $request, $id){
        $enclos = Enclos::findOrFail($id);
        $enclos->update($request->all());
        $enclos->environnements()->sync($request->environnements_id);
        $enclos->personnels()->sync($request->personnels_id);
        $enclos->save();
        return redirect()->route('enclos.index');

    }
}
