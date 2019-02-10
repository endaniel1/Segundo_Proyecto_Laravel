<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest {
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    //este metodo se usa para cuando esta es default ose nullo
    public function authorize() {
        return true; //la cambie a true para q se utilice
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    ///y este metodo es donde se van a definir las reglas o en nuestro caso se van a validar los datos q queremos q se validen
    //en esta casp son los nombres de los campos q queromos q validen
    //y despues cual seria la vaiidacion q quermos q tenga
    public function rules() {
        return [
            "name"     => ["min:4", "max:10", "required"],
            "email"    => ["min:4", "max:120", "required", "unique:users"],
            "password" => ["min:4", "max:10", "required"],
        ];
    }
    //este metodo es para los mensajes q muestran
    //se coloca el nombre del campo y luego un . para hacer referencia a la validacion
    //y el mensaje q se quiere q se muestre
    public function messages() {
        return [
            //estos son los mensaje para cuando se escriba el nombre de usuario
            'name.required'     => "Por favor, Escribe tu Usuario",
            'name.min'          => "El Usuario, no puede ser menor de 4 Caracteres!",
            'name.max'          => "El Usuario, no puede Tener Mas de 10 Caracteres!",
            //estos son los mensaje para cuando se escriba el Correo
            'email.required'    => "Por favor, Escribe tu Correo",
            'email.min'         => "El Correo, no puede ser menor de 4 Caracteres!",
            'email.max'         => "El Correo, no puede Tener Mas de 120 Caracteres!",
            'email.unique'      => "Ese Correo, Ya pertenece aun Usuario!",
            //estos son los mensaje para cuando se escriba el nombre de usuario
            'password.required' => "Por favor, Escribe tu Contraseña",
            'password.min'      => "La Contraseña, no puede ser menor de 4 Caracteres!",
            'password.max'      => "La Contraseña, no puede Tener Mas de 10 Caracteres!",
        ];
    }

}
