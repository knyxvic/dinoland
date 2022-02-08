<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProduitRequest;
use App\Models\Produit;
use App\Models\Categorie;
use App\Models\Taxe;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    public function index(){
        $produits = Produit::select('id', 'nom', 'prix','quantite', 'taxe_id', 'category_id')->with(['taxe:id,nom,taux','category:id,nom'])->get();
        return view('produits.index', ['produits'=>$produits]);
    }

    public function show($id){
        $produit = Produit::select('id', 'nom', 'prix','quantite', 'taxe_id', 'category_id')->whereId($id)->with(['taxe:id,nom,taux','category:id,nom'])->first();
        $taxes = Taxe::select('id','nom')->get();
        $categories = Categorie::select('id','nom')->get();

        return view('produits.show', ['produit'=>$produit,'taxes'=>$taxes,'categories'=>$categories]);
    }

    public function create(){
        $taxes = Taxe::select('id','nom')->get();
        $categories = Categorie::select('id','nom')->get();
        return view('produits.create',['taxes'=>$taxes,'categories'=>$categories]);
    }

    public function store(ProduitRequest $request){
        $produit = Produit::create($request->all());
        return redirect()->route('produits.index');
    }

    public function destroy($id){
        $produit = Produit::find($id);
        $produit->clients()->sync([]);
        $produit->commandes()->sync([]);
        if ($produit->delete()) {
            return redirect()->route('produits.index');
        }
    }

    public function update(ProduitRequest $request, Produit $produit){
        $produit->update($request->all());
        $produit->save();
        return redirect()->route('produits.index');

    }
}
