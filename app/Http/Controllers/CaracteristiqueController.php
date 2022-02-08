<?php

namespace App\Http\Controllers;

use App\Http\Requests\CaracteristiqueRequest;
use App\Models\Caracteristique;
use Illuminate\Http\Request;

class CaracteristiqueController extends Controller
{

    public function index(){
        $caracteristiques = Caracteristique::select('id', 'nom')->with('dinos:id')->get();
        return view('caracteristiques.index',['caracteristiques'=>$caracteristiques]);
    }
    public function show($id){
        $caracteristique = Caracteristique::select('id', 'nom')->whereId($id)->first();
        return view('caracteristiques.show',['caracteristique'=>$caracteristique]);
    }

    public function create(){
        return view('caracteristiques.create');
    }
    public function store(CaracteristiqueRequest $request){
        Caracteristique::create($request->all());
        return redirect()->route('caracteristiques.index');
    }
    public function destroy(Caracteristique $caracteristique){
        if ($caracteristique->delete()) {
            return redirect()->route('caracteristiques.index');
        }
    }
    public function update(CaracteristiqueRequest $request, Caracteristique $caracteristique){
        $caracteristique->nom = $request->nom;
        $caracteristique->save();
        return redirect()->route('caracteristiques.index');
    }
}
