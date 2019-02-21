<?php

namespace App\Http\Controllers;
use App\Article; //aqui llamamos a la clase article para usarla
use App\Category; //aqui llamamos a la clase category para usarla
use App\Tag; //aqui llamamos a la clase Tag para usarla
use Carbon\Carbon;

//usamos la clase carbon para usarla

class FrontController extends Controller {

    public function __construct() {

        Carbon::setlocale("es");
    }

    public function index() {

        $articles = Article::orderBy("id", "DESC")->paginate(4); //aqui ordenamos y paginamos con el metodo orderBy() y paginate()
        //despues con el metdo each hacmos un recorrido a la varible para traer las relaciones correspondiente  a el modelo
        $articles->each(function ($articles) {
            $articles->category;
            $articles->images = \App\Image::find($articles->id); //aqui la relacion de los articulos con las imagenes la tuve q resplazar manualmente poque tengo un problema q es q no me lee la relacion de de las imagenes con los ariculos para q me pueda dar y buscar las imagen del ariculo

        });

        //https://www.videosporno.name/pero-que-haces-sobandome-las-tetas-que-soy-tu-sobrina/
        //retornamos a la la vista del siguiente y le pasamos como variable con el metdo with
        return view("front.index")
            ->with("articles", $articles);

    }

    //metodo para buscar las categorias
    public function buscadorCategory($name) {
        //llamamos al metodo categoy y a su scope llamado Buscador Category y le pasamos el nombre del de la cartegori
        //ademas utilizamso el metodo firts() q es para q nos busque el el primero y ademas porque nos va a devolver lo q encuentre en forma de un objeto
        $category = Category::BuscadorCategory($name)->first();

        $articles = $category->articles()->paginate(4); //aqu creamos una variable llamada articles q nos tenga la relacion entre la categoria con los articulos y paginamos ese resultado. articles() lo colocamos asi para q nos traiga como en forma de una instancia todos los resultados q encuente
        //ahora con el metdo each recoremos la variable y llamamos a las relaciones q carga
        $articles->each(function ($articles) {
            $articles->category;
            $articles->images = \App\Image::find($articles->id); //aqui igual tuve q remplazar la relacion porque no me daba
        });
        //y aqui retonamos a la vista pasando le la variable con el metdo with
        return view("front.index")
            ->with("articles", $articles);
    }
    //metodo para buscar los Tags
    public function buscadorTag($name) {
        //llamamos al metodo tag y a su scope llamado Buscador Tag y le pasamos el nombre del del tag
        //ademas utilizamso el metodo firts() q es para q nos busque el el primero y ademas porque nos va a devolver lo q encuentre en forma de un objeto
        $tag = Tag::BuscadorTag($name)->first(); //aqu creamos una variable llamada articles q nos tenga la relacion entre los tags con los articulos y paginamos ese resultado. articles() lo colocamos asi para q nos traiga como en forma de una instancia todos los resultados q encuente
        //ahora con el metdo each recoremos la variable y llamamos a las relaciones q carga

        $articles = $tag->articles()->paginate(4);
        $articles->each(function ($articles) {
            $articles->category;
            $articles->images = \App\Image::find($articles->id); //aqui igual tuve q remplazar la relacion porque no me daba

        });
        //y aqui retonamos a la vista pasando le la variable con el metdo with
        return view("front.index")
            ->with("articles", $articles);
    }

    public function viewArticle($slug) {
        $article = Article::findBySlugOrFail($slug); //el metodo findBySlugOrFail() busca por slug o falla esto es para q cuando falla arroja un error
        //llamos aqui a la relaciones de user, tags, category y images
        $article->user;
        $article->tags;
        $article->category;
        $article->images;
        return view("front.article")->with("article", $article);
    }

}
