<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdresseRequest;
use App\Models\Adresse;
use App\Models\Categorie;
use App\Models\Client;
use App\Models\Pays;
use Illuminate\Http\Request;

class AdresseController extends Controller
{
    public function clientShow($id){
        $adresse = Adresse::find($id);
        $pays = Pays::all();
        $categories = Categorie::select('id','nom')->get();

        return view('adresses.showClient',['adresse' => $adresse,'pays'=>$pays,'categories'=>$categories]);
    }

    public function createClient(){
        $categories = Categorie::select('id','nom')->get();
        $pays = Pays::all();

        return view('adresses.createClient',['categories'=>$categories,'pays'=>$pays]);
    }

    public function store(AdresseRequest $request){
        $adresse = Adresse::create($request->all());
        if($request->client_id){
            $client = Client::find($request->client_id);
            $adresse->clients()->sync($request->client_id);

            if($request->adresse_facturation){
                $client->adresse_facturation_id = $adresse->id;

            }
            if($request->adresse_livraison){
                $client->adresse_livraison_id = $adresse->id;

            }
            $client->save();
        }
        return redirect()->route('client.compte');
    }



    public function update(AdresseRequest $request, $id){
        $adresse = Adresse::find($id);
        $adresse->rue = $request->rue;
        $adresse->cp = $request->cp;
        $adresse->ville = $request->ville;
        $adresse->pays_id = $request->pays_id;
        if($request->client_id){
            $client = Client::find($request->client_id);
            if($request->adresse_facturation){
                $client->adresse_facturation_id = $adresse->id;

            }else{
                $client->adresse_facturation_id = null;
            }
            if($request->adresse_livraison){
                $client->adresse_livraison_id = $adresse->id;

            }else{
                $client->adresse_livraison_id = null;
            }
            $client->save();
        }
        $adresse->save();
        return redirect()->route('client.compte');
    }
}
