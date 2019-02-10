<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model {

    //aqui creamos un atributo q se llama el nombre de la tabla
    protected $table = "images";

    //y otro q seria q carga los objetos Json permitidos para este modelo
    protected $fillable = ["name", "article_id"];

    public function article() {
        return $this->belongsTo("App\Article");
    }

}
