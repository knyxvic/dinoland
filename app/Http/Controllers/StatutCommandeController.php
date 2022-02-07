<?php

namespace App\Http\Controllers;

use App\Models\Statut_commande;
use Illuminate\Http\Request;

class StatutCommandeController extends Controller
{
    public function index(){
        $statutsCommandes = Statut_commande::select('id', 'nom')->with('commandes:id,statut_commande_id')->get();
        return view('statutsCommandes.index',['statutsCommandes'=>$statutsCommandes]);
    }
    public function show($id){
        $statutCommande = Statut_commande::select('id', 'nom')->whereId($id)->first();
        return view('statutsCommandes.show',['statutCommande'=>$statutCommande]);
    }

    public function create(){
        return view('statutsCommandes.create');
    }
    public function store(Request $request){
        Statut_commande::create($request->all());
        return redirect()->route('statutsCommandes.index');
    }
    public function destroy($id){
        $statutCommande = Statut_commande::find($id);
        if ($statutCommande->delete()) {
            return redirect()->route('statutsCommandes.index');
        }
    }
    public function update(Request $request, $id){
        $statutCommande = Statut_commande::find($id);
        $statutCommande->nom = $request->nom;
        $statutCommande->save();
        return redirect()->route('statutsCommandes.index');
    }
}
