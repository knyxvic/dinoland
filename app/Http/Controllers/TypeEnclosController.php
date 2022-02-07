<?php

namespace App\Http\Controllers;

use App\Models\TypeEnclos;
use Illuminate\Http\Request;

class TypeEnclosController extends Controller
{
    public function index(){
        $typesEnclos = TypeEnclos::select('id', 'nom')->with('enclos:id,type_enclos_id')->get();
        return view('typeEnclos.index',['typesEnclos'=>$typesEnclos]);
    }
    public function show($id){
        $typeEnclos = Type_enclos::select('id', 'nom')->whereId($id)->first();
        return view('typeEnclos.show',['typeEnclos'=>$typeEnclos]);
    }

    public function create(){
        return view('typeEnclos.create');
    }
    public function store(Request $request){
        Type_enclos::create($request->all());
        return redirect()->route('typeEnclos.index');
    }
    public function destroy($id){
        $typeEnclos = Type_enclos::find($id);
        if ($typeEnclos->delete()) {
            return redirect()->route('typeEnclos.index');
        }
    }
    public function update(Request $request, $id){
        $typeEnclos = Type_enclos::find($id);
        $typeEnclos->nom = $request->nom;
        $typeEnclos->save();
        return redirect()->route('typeEnclos.index');
    }
}
