<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model {

    //aqui creamos un atributo q se llama el nombre de la tabla
    protected $table = "tags";

    //y otro q seria q carga los objetos Json permitidos para este modelo
    protected $fillable = ["name"];

    public function articles() {
        $this->belongsToMany("App\Article")->withTimestamps();
    }

    //para hacer un scope para un buscador
    //se crea un funcion publica q tenga la palabra scope y el nombre del id q vamos a buscar del input
    //se le pasa como parametro una varible query y el nombre del campo q vamos a buscar osea el input
    public function scopeBuscador($query, $name) {
        return $query->where('name', 'like', '%' . $name . '%'); //where es donde
        //retornamos la query q vamos a buscar
        //en este caso buscamos el nombre del tags(porque el tag por q estamos tabrabando con el model) seguidamente la forma en q vamos a buscar q es like y trese parametro es la varible  a q hacemos referencia para buscar
    }

}
