<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {

    //aqui creamos un atributo q se llama el nombre de la tabla
    protected $table = "categories";

    //y otro q seria q carga los objetos Json permitidos para este modelo
    protected $fillable = ["name"];

    //para indicar las diferentes relaciones
    //se crea una funcion pulica q tenga el nombre del modelo en plural a la q vamos indicar la relacion
    public function articles() {
        //hasMany representa la relacion de un a muchos
        return $this->hasMany("App\Article");
    }
}
