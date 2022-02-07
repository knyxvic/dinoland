<?php

namespace App\Http\Controllers;

use App\Models\Nourriture;
use Illuminate\Http\Request;

class NourritureController extends Controller
{
    public function index(){
        $nourritures = Nourriture::select('id', 'nom')->with('dinos:id,nourriture_id')->get();
        return view('nourritures.index',['nourritures'=>$nourritures]);
    }
    public function show($id){
        $nourriture = Nourriture::select('id', 'nom')->whereId($id)->first();
        return view('nourritures.show',['nourriture'=>$nourriture]);
    }

    public function create(){
        return view('nourritures.create');
    }
    public function store(Request $request){
        Nourriture::create($request->all());
        return redirect()->route('nourritures.index');
    }
    public function destroy(Nourriture $nourriture){
        if ($nourriture->delete()) {
            return redirect()->route('nourritures.index');
        }
    }
    public function update(Request $request, Nourriture $nourriture){
        $nourriture->nom = $request->nom;
        $nourriture->save();
        return redirect()->route('nourritures.index');
    }
}
