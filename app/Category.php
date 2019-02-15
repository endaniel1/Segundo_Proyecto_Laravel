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
    //scope de categorias para buscarlas
    //se le pasa como parametro una varible $query y en este caso una varible q vamosa buscar
    public function scopeBuscadorCategory($query, $name) {

        return $query->where('name', '=', $name); //where() es el metodo donde.
        //retornamos la $query q vamos a buscar
        // where recive como parametro el nombre de la columna a q vamos a buscar la condicion y la varible de busqueda
        //en este caso buscamos el nombre de la categorias

    }
}
