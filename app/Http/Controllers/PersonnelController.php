<?php

namespace App\Http\Controllers;

use App\Http\Requests\PersonnelRequest;
use App\Models\Adresse;
use App\Models\Enclos;
use App\Models\Pays;
use App\Models\Personnel;
use App\Models\TypePersonnel;
use Illuminate\Http\Request;

class PersonnelController extends Controller
{
    public function index(){
        $personnels = Personnel::select('id', 'nom', 'prenom','tel', 'email','adresse_id','type_personnel_id')->with(['typePersonnel:id,nom','adresse:id,rue,cp,ville,pays_id'])->get();
        return view('personnels.index', ['personnels'=>$personnels]);
    }

    public function show($id){
        $personnel = Personnel::select('id', 'nom', 'prenom','tel', 'email','adresse_id','type_personnel_id')->where('id',$id)->with(['typePersonnel:id,nom','adresse:id,rue,cp,ville,pays_id'])->first();
        $typesPersonnels = TypePersonnel::select('id', 'nom')->get();
        $pays = Pays::select('id', 'nom')->get();
        $enclos = Enclos::select('id', 'nom')->get();

        foreach ($personnel->enclos as $t_enclos) {

            if($enclos->contains($t_enclos)){
                $enclo = $enclos->where('id',$t_enclos->id)->first();
                $enclo->active = true;
            }
        }


        return view('personnels.show',['personnel'=>$personnel, 'typesPersonnels'=>$typesPersonnels, 'pays'=>$pays, 'enclos'=>$enclos]);
    }

    public function create(){
        $typesPersonnels = TypePersonnel::select('id', 'nom')->get();
        $enclos = Enclos::select('id', 'nom')->get();
        $pays = Pays::select('id', 'nom')->get();
        return view('personnels.create',['typesPersonnels'=>$typesPersonnels, 'enclos'=>$enclos, 'pays'=>$pays]);
    }

    public function store(PersonnelRequest $request){
        $adresse = Adresse::create($request->all());
        $adresse->save();
        $data = $request->all();
        $data['adresse_id'] = $adresse->id;
        $personnel = Personnel::create($data);
        $personnel->enclos()->sync($request->enclos_id);

        $personnel->enclos()->sync($request->enclos_id);
        $personnel->save();
        return redirect()->route('personnels.index');
    }

    public function destroy($id){
        $personnel = Personnel::find($id);
        $personnel->enclos()->sync([]);
        if ($personnel->delete()) {
            return redirect()->route('personnels.index');
        }
    }

    public function update(PersonnelRequest $request, $id){

        $personnel = Personnel::findOrFail($id);
        $personnel->update($request->all());
        $personnel->enclos()->sync($request->enclos_id);

        $personnel->enclos()->sync($request->enclos_id);
        $personnel->save();
        return redirect()->route('personnels.index');

    }
}
