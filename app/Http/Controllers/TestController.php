<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Controllers\Controller;

class TestController extends Controller {
    //esto es para la q se esta contectando de la ruta con el controlador
    public function view($id) {
        //dd($id); //esto es para imprimer todo lo relacionado a es como un gerper

        $article = Article::find($id); //estramos en la clase artiles y mandamos a buscar con find() el id q estamos mencionando
        //aqui lo q hacemos es mandar a llamar los metodos q tiene esta clase
        //en te caso los metodo q llamamos son los del usuario categorias y los tag correspondiente a ese articulo
        $article->user;
        $article->category;
        $article->tags;

        //dd($article); //aqui imprimimos toda esa informacion para verla

        //retornadno a una vista
        return view("prueba.index", ["article" => $article]);

    }

}
