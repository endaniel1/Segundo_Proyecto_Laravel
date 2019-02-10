<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TagRequest extends FormRequest {
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            "name" => ["required", "max:150", "unique:tags"],
        ];
    }
    public function messages() {
        return [
            //estos son los mensaje para cuando se escriba el nombre de usuario
            'name.required' => "Por favor, Escribe el Tag",
            'name.max'      => "El Tag, no puede ser Maxima de 150 Caracteres!",
            'name.unique'   => "Ese Tag, Ya Existe!",
        ];
    }
}
