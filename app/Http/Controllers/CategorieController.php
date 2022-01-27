<?php

namespace App\Http\Controllers;


use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function index(){
        $categories = Categorie::select('id', 'nom')->with('produits:id,categorie_id')->get();
        return view('categories.index',['categories'=>$categories]);
    }
    public function show($id){
        $categorie = Categorie::select('id', 'nom')->whereId($id)->first();
        return view('categories.show',['categorie'=>$categorie]);
    }

    public function create(){
        return view('categories.create');
    }
    public function store(Request $request){
        Categorie::create($request->all());
        return redirect()->route('categories.index');

    }
    public function destroy($id){
        $categorie = Categorie::find($id);
        if ($categorie->delete()) {
            return redirect()->route('categories.index');
        }
    }
    public function update(Request $request, $id){
        $categorie = Categorie::find($id);
        $categorie->nom = $request->nom;
        $categorie->save();
        return redirect()->route('categories.index');
    }
}
