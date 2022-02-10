<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Models\Adresse;
use App\Models\Categorie;
use App\Models\Client;
use App\Models\Commande;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    public function index(){
        $categories = Categorie::select('id','nom')->get();

        return view('clients.login',['categories'=>$categories]);
    }

    public function dashboard(){
        return view('clients.index');
    }

    public function login(Request $request){
        $check = $request->all();
        if(Auth::guard('client')->attempt(['email'=>$check['email'],'password'=>$check['password']])){

            return redirect()->route('accueil')->with('error','Login Successfully');
        }else{
            return back();
        }
    }

    public function logout(){
        Auth::guard('client')->logout();
        return redirect()->route('accueil');
    }

    public function showRegister(){
        $categories = Categorie::select('id','nom')->get();
        return view('clients.register',['categories'=>$categories]);
    }

    public function register(Request $request){


        if($request->password!= $request->password_confirmation){
            return redirect()->back()->with('error','password error');
        }else{
            Client::insert([
                'nom'=> $request->nom,
                'prenom'=> $request->prenom,
                'tel'=> $request->tel,
                'email'=> $request->email,
                'password'=>Hash::make($request->password),
            ]);

            return redirect()->route('client_login_from');
        }

    }

    public function compte(){
        $user = Auth::guard('client')->user();
        $categories = Categorie::select('id','nom')->get();

        $client = Client::select('id','nom','prenom','tel','email','adresse_livraison_id','adresse_facturation_id')->with(['adresses:id,rue,cp,ville,pays_id','commandes:id,prixTTC,adresse_facturation,adresse_livraison,mode_livraison_id,statut_commande_id,client_id'])->where('id',$user->id)->first();
        return view('clients.compte',['client'=>$client,'categories'=>$categories]);
    }

    public function commande($id){
        $client = Auth::guard('client')->user();
        $categories = Categorie::select('id','nom')->get();

        $commande = Commande::select('id','prixTTC','adresse_facturation','adresse_livraison','mode_livraison_id','statut_commande_id','client_id')->with(['client:id','produits:id,nom,category_id'])->whereId($id)->first();
        return view('clients.commande',['client'=>$client,'commande'=>$commande,'categories'=>$categories]);
    }

    public function panier(){
        $categories = Categorie::select('id','nom')->get();
        $panier = Client::select('id')->with(['produits:id,nom,prix,category_id,taxe_id'])->whereId(Auth::guard('client')->user()->id)->first();
        foreach ($panier->produits as $produit){
            $panier->total += $produit->prix * $produit->taxe->taux * $produit->pivot->quantite;
        }
        $client = Client::select('id','adresse_facturation_id', 'adresse_livraison_id')->with(['adresses:id,rue,cp,ville'])->whereId(Auth::guard('client')->user()->id)->first();
        //$adresses = Adresse::select('id','rue','cp','ville','pays_id')->with(['pays:id,nom','clients:id,adresse_livraison_id,adresse_facturation_id'])->wherePivot('client_id',Auth::guard('client')->user()->id)->first();
        return view('clients.panier',['categories'=>$categories, 'panier'=>$panier,'client'=>$client]);
    }

    public function validerPanier(Request $request){
        $panier = Client::select('id')->with(['produits:id,nom,prix,category_id,taxe_id'])->whereId(Auth::guard('client')->user()->id)->first();
        $totalTTC = 0;
        foreach($panier->produits as $produit){
            $totalTTC += $produit->prix * $produit->taxe->taux * $produit->pivot->quantite;
        }
        $adresse_facturation = Adresse::find($request->adresse_facturation);
        $adresse_livraison = Adresse::find($request->adresse_livraison);
        $adresse_livraison = $adresse_livraison->rue.' '.$adresse_livraison->cp.' '.$adresse_livraison->ville.' '.$adresse_livraison->pays->nom;
        $adresse_facturation = $adresse_facturation->rue.' '.$adresse_facturation->cp.' '.$adresse_facturation->ville.' '.$adresse_facturation->pays->nom;
        $commande = Commande::create([
            'prixTTC'=>$totalTTC,
            'adresse_livraison'=>$adresse_livraison,
            'adresse_facturation'=>$adresse_facturation,
            'mode_livraison_id'=>1,
            'statut_commande_id'=>1,
            'client_id'=>Auth::guard('client')->user()->id,
        ]);
        foreach($panier->produits as $produit){
            $commande->produits()->attach($produit->id, ['quantite'=>$produit->pivot->quantite, 'prixHT'=>$produit->prix,'taux'=>$produit->taxe->taux]);
        }
        $panier->produits()->sync([]);
    }

    public function accueil(){
        $produits = Produit::select('id', 'nom', 'prix','quantite', 'taxe_id', 'category_id')->with(['taxe:id,nom,taux','category:id,nom'])->orderBy('created_at')->limit(12)->get();
        $categories = Categorie::select('id','nom')->get();
        $panier = null;
        if(\Illuminate\Support\Facades\Auth::guard('client')->user()!=null) {
            $panier = Client::select('id')->with(['produits:id,nom,prix,category_id,taxe_id'])->whereId(Auth::guard('client')->user()->id)->first();
            $totalTTC = 0;
            foreach($panier->produits as $produit){
                $totalTTC += $produit->prix * $produit->taxe->taux * $produit->pivot->quantite;
            }
            $panier->totalTTC = $totalTTC;
        }
        return view('market.index', ['produits' => $produits, 'categories'=>$categories, 'panier'=>$panier]);
    }

    public function supprimerProduit($id){
        $panier = Client::select('id')->with(['produits:id,nom,prix,category_id,taxe_id'])->whereId(Auth::guard('client')->user()->id)->first();
        $panier->produits()->detach($id);
        return redirect()->back();
    }


    public function addProduit(Request $request, $id){

        $exist = false;
        $panier = Client::select('id')->with(['produits:id,nom,prix,category_id,taxe_id'])->whereId(Auth::guard('client')->user()->id)->first();
        foreach($panier->produits as $produit){
            if($produit->id == $id){
                $produit->pivot->quantite += 1;
                $produit->pivot->save();
                $exist = true;
            }
        }
        if(!$exist){
            $panier->produits()->attach($id, ['quantite'=>$request->quantite]);
        }
        return redirect()->back();
    }


}
