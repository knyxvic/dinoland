<?php

namespace App\Http\Controllers;

use App\Http\Requests\ModeLivraisonRequest;
use App\Models\Mode_livraison;
use Illuminate\Http\Request;

class ModeLivraisonController extends Controller
{
    public function index(){
        $modesLivraisons = Mode_livraison::select('id', 'nom')->with('commandes:id,mode_livraison_id')->get();
        return view('modesLivraisons.index',['modesLivraisons'=>$modesLivraisons]);
    }
    public function show($id){
        $modeLivraison = Mode_livraison::select('id', 'nom')->whereId($id)->first();
        return view('modesLivraisons.show',['modeLivraison'=>$modeLivraison]);
    }

    public function create(){
        return view('modesLivraisons.create');
    }
    public function store(ModeLivraisonRequest $request){
        Mode_livraison::create($request->all());
        return redirect()->route('modesLivraisons.index');
    }
    public function destroy($id){
        $modeLivraison = Mode_livraison::find($id);
        if ($modeLivraison->delete()) {
            return redirect()->route('modesLivraisons.index');
        }
    }
    public function update(ModeLivraisonRequest $request, $id){
        $modeLivraison = Mode_livraison::find($id);
        $modeLivraison->nom = $request->nom;
        $modeLivraison->save();
        return redirect()->route('modesLivraisons.index');
    }
}
