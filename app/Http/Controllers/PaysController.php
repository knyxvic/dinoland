<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pays;

class PaysController extends Controller
{
    public function index(){
        $pays = Pays::select('id', 'nom')->with('adresses:id,pays_id')->get();
        return view('pays.index',['pays'=>$pays]);
    }
    public function show($id){
        $pays = Pays::select('id', 'nom')->whereId($id)->first();
        return view('pays.show',['pays'=>$pays]);
    }

    public function create(){
        return view('pays.create');
    }
    public function store(Request $request){
        Pays::create($request->all());
        return redirect()->route('pays.index');
    }
    public function destroy($id){
        $pays = Pays::find($id);
        if ($pays->delete()) {
            return redirect()->route('pays.index');
        }
    }
    public function update(Request $request, $id){
        $pays = Pays::findOrFail($id);
        $pays->nom = $request->nom;
        $pays->save();
        return redirect()->route('pays.index');
    }
}
