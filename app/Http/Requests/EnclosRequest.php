<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EnclosRequest extends FormRequest
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
            'superficie'=> 'required|numeric',
            'typeEnclos_id'=>'required',
            'climat_id'=>'required',
        ];
    }

    public function messages(){
        return[
            'nom.required'=>'Le champs Nom est obligatoire',
            'nom.string'=>'La longueur maximum est de 255 caractères',
            'superficie.required'=>'Le champs Superficie est obligatoire',
            'superficie.numeric'=>'Le champs Superficie doit être un numérique',
            'typeEnclos_id.required'=>'Le champs Type Enclos est obligatoire',
            'climat_id.required'=>'Le champs Climat est obligatoire',
        ];
    }
}
