<?php

namespace App\Http\Controllers;

use App\Models\Espece;
use Illuminate\Http\Request;

class EspeceController extends Controller
{
    public function index(){
        $especes = Espece::select('id', 'nom')->with('dinos:id,espece_id')->get();
        return view('especes.index',['especes'=>$especes]);
    }
    public function show($id){
        $espece = Espece::select('id', 'nom')->whereId($id)->first();
        return view('especes.show',['espece'=>$espece]);
    }

    public function create(){
        return view('especes.create');
    }
    public function store(Request $request){
        Espece::create($request->all());
        return redirect()->route('especes.index');
    }
    public function destroy(Espece $espece){
        if ($espece->delete()) {
            return redirect()->route('especes.index');
        }
    }
    public function update(Request $request, Espece $espece){
        $espece->nom = $request->nom;
        $espece->save();
        return redirect()->route('especes.index');
    }
}
