<?php

namespace App;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Model;

class Article extends Model {

    use Sluggable;
    use SluggableScopeHelpers;

    public function sluggable() {
        return [
            'slug' => [
                'source' => 'title',
            ],
        ];
    }

    //aqui creamos un atributo q se llama el nombre de la tabla
    protected $table = "articles";

    //y otro q seria q carga los objetos Json permitidos para este modelo
    protected $fillable = ["title", "content", "category_id", "user_id"];

    //para indicar las diferentes relaciones
    //se crea una funcion pulica q tenga el nombre del modelo en plural a la q vamos indicar la relacion
    public function category() {
        //belongsTo representa la parte contraria de la relacion de uno a muchos
        return $this->belongsTo("App\Category");
    }

    public function user() {
        return $this->belongsTo("App\User");
    }

    public function images() {
        return $this->belongsTo("App\Image");
    }

    public function tags() {
        //belongsToMany representa la parte contraria de la relacion de muchos a muchos
        return $this->belongsToMany("App\Tag");
    }
    //para hacer un scope para un buscador
    //se crea un funcion publica q tenga la palabra scope y el nombre del id q vamos a buscar del input
    //se le pasa como parametro una varible query y el nombre del campo q vamos a buscar osea el input
    public function scopeBuscador($query, $title) {
        return $query->where('title', 'like', '%' . $title . '%'); //where() es donde vamos a buscar
        //retornamos la query q vamos a buscar
        //en este caso buscamos el title del articulo(porque el articulo por q estamos tabrabando con el model) seguidamente la forma en q vamos a buscar q es like y trese parametro es la varible  a q hacemos referencia para buscar
    }
}
