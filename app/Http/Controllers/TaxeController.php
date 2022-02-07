<?php

namespace App\Http\Controllers;

use App\Models\Taxe;
use Illuminate\Http\Request;

class TaxeController extends Controller
{
    public function index(){
        $taxes = Taxe::select('id', 'nom','taux')->with('produits:id,taxe_id')->get();
        return view('taxes.index',['taxes'=>$taxes]);
    }
    public function show($id){
        $taxe = Taxe::select('id', 'nom', 'taux')->whereId($id)->first();
        return view('taxes.show',['taxe'=>$taxe]);
    }

    public function create(){
        return view('taxes.create');
    }
    public function store(Request $request){
        Taxe::create($request->all());
        return redirect()->route('taxes.index');

    }
    public function destroy($id){
        $taxe = Taxe::find($id);
        if ($taxe->delete()) {
            return redirect()->route('taxes.index');
        }
    }
    public function update(Request $request, $id){
        $taxe = Taxe::find($id);
        $taxe->nom = $request->nom;
        $taxe->taux = $request->taux;
        $taxe->save();
        return redirect()->route('taxes.index');
    }
}
