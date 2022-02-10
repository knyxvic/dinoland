<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Models\Categorie;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    public function index(){
        return view('clients.login');
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
        $client = Client::select('id','nom','prenom','tel','email','adresse_livraison_id','adresse_facturation_id')->with(['adresses:id,rue,cp,ville,pays_id'])->get();
        return view('clients.compte',['clients'=>$client]);
    }


}
