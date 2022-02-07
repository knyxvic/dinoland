<?php

namespace App\Http\Controllers;

use App\Models\Environnement;
use http\Env;
use Illuminate\Http\Request;

class EnvironnementController extends Controller
{
    public function index(){
        $environnements = Environnement::select('id', 'nom')->with('enclos:id')->get();
        return view('environnements.index',['environnements'=>$environnements]);
    }
    public function show($id){
        $environnement = Environnement::select('id', 'nom')->whereId($id)->first();
        return view('environnements.show',['environnement'=>$environnement]);
    }

    public function create(){
        return view('environnements.create');
    }
    public function store(Request $request){
        Environnement::create($request->all());
        return redirect()->route('environnements.index');
    }
    public function destroy(Environnement $environnement){
        if ($environnement->delete()) {
            return redirect()->route('environnements.index');
        }
    }
    public function update(Request $request, Environnement $environnement){
        $environnement->nom = $request->nom;
        $environnement->save();
        return redirect()->route('environnements.index');
    }
}
