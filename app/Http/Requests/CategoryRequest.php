<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest {
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
            "name" => ["max:120", "required", "unique:categories"],
        ];
    }
    public function messages() {
        return [
            //estos son los mensaje para cuando se escriba el nombre de usuario
            'name.required' => "Por favor, Escribe la Categoria",
            'name.max'      => "La Categoria, no puede ser Maxima de 120 Caracteres!",
            'name.unique'   => "Esa Categoria, Ya Existe!",
        ];
    }
}
