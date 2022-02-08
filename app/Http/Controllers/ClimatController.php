<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClimatRequest;
use App\Models\Climat;
use Illuminate\Http\Request;

class ClimatController extends Controller
{
    public function index(){
        $climats = Climat::select('id', 'nom')->with('enclos:id,climat_id')->get();
        return view('climats.index',['climats'=>$climats]);
    }
    public function show($id){
        $climat = Climat::select('id', 'nom')->whereId($id)->first();
        return view('climats.show',['climat'=>$climat]);
    }

    public function create(){
        return view('climats.create');
    }
    public function store(ClimatRequest $request){
        Climat::create($request->all());
        return redirect()->route('climats.index');
    }
    public function destroy($id){
        $climat = Climat::find($id);
        if ($climat->delete()) {
            return redirect()->route('climats.index');
        }
    }
    public function update(ClimatRequest $request, $id){
        $climat = Climat::find($id);
        $climat->nom = $request->nom;
        $climat->save();
        return redirect()->route('climats.index');
    }
}
