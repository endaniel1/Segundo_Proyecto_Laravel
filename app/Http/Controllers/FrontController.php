<?php

namespace App\Http\Controllers;
use App\Article; //aqui llamamos a la clase article para usarlo
use App\Category; //aqui llamamos a la clase category para usarlo
use App\Tag;
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
            $articles->images = \App\Image::find($articles->id); //aqui la relacuion de los articulos con las imagenes la tuve q resplazar manualmente poque tengo un problema q es q no me lee la relacion de de las imagenes con los ariculos para q me pueda dar y buscar las imagen del ariculo

        });

        //https://www.videosporno.name/pero-que-haces-sobandome-las-tetas-que-soy-tu-sobrina/
        //retornamos a la la vista del siguiente y le pasamos como variable con el metdo with
        return view("front.index")
            ->with("articles", $articles);

    }

    //metodo para buscar las categorias
    public function buscadorCategory($name) {

        $category = Category::BuscadorCategory($name)->first();
        //dd($category->articles);
        $articles = $category->articles()->paginate(4);
        $articles->each(function ($articles) {
            $articles->category;
            $articles->images = \App\Image::find($articles->id);

        });
        return view("front.index")
            ->with("articles", $articles);
    }
    public function buscadorTag($name) {
        $tag = Tag::BuscadorTag($name)->first();

        $articles = $tag->articles()->paginate(4);
        $articles->each(function ($articles) {
            $articles->category;
            $articles->images = \App\Image::find($articles->id);

        });
        return view("front.index")
            ->with("articles", $articles);
    }
}
