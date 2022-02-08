<?php

namespace App\Http\Controllers;

use App\Http\Requests\TypePersonnelRequest;
use App\Models\TypePersonnel;
use Illuminate\Http\Request;

class TypePersonnelController extends Controller
{
    public function index(){
        $typesPersonnels = TypePersonnel::select('id', 'nom')->with('personnels:id,type_personnel_id')->get();
        return view('typesPersonnels.index',['typesPersonnels'=>$typesPersonnels]);
    }
    public function show($id){
        $typePersonnels = TypePersonnel::select('id', 'nom')->whereId($id)->first();
        return view('typesPersonnels.show',['typePersonnels'=>$typePersonnels]);
    }

    public function create(){
        return view('typesPersonnels.create');
    }
    public function store(TypePersonnelRequest $request){
        TypePersonnel::create($request->all());
        return redirect()->route('typesPersonnels.index');
    }
    public function destroy($id){
        $typePersonnels = TypePersonnel::find($id);
        if ($typePersonnels->delete()) {
            return redirect()->route('typesPersonnels.index');
        }
    }
    public function update(TypePersonnelRequest $request, $id){
        $typePersonnels = TypePersonnel::find($id);
        $typePersonnels->nom = $request->nom;
        $typePersonnels->save();
        return redirect()->route('typesPersonnels.index');
    }
}
