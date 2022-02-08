<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DinoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nom'=> 'required|string:255',
            'taille'=> 'required|numeric',
            'poids'=> 'required|numeric',
            'espece_id'=>'required',
            'nourriture_id'=>'required',
            'enclos_id'=>'required',
        ];
    }

    public function messages(){
        return[
            'nom.required'=>'Le champs Nom est obligatoire',
            'nom.string'=>'La longueur maximum est de 255 caractères',
            'taille.required'=>'Le champs Taille est obligatoire',
            'taille.numeric'=>'Le champs Taille doit être un numérique',
            'poids.required'=>'Le champs Poids est obligatoire',
            'poids.numeric'=>'Le champs Poids doit être un numérique',
            'nourriture_id.required'=>'Le champs Nourriture est obligatoire',
            'enclos_id.required'=>'Le champs Enclos est obligatoire',
        ];
    }
}
