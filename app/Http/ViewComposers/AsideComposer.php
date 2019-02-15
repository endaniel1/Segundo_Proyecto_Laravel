<?php
//para creaar  una vista con composer

namespace App\Http\ViewComposers; ///colocamos el namespace de donde vamos a sacar el provider
use App\Category; //aqui lo q hacmos es utilizar el modelo Category para usarlos
use App\Tag; //aqui lo q hacmos es utilizar el modelo Tag para usarlos
use Illuminate\View\View;

//y por ultimo utilizamos esto es es la clase de larvel

//creamos aqui una nueva clases q es la q va a utilizar para la vista con compose
class AsideComposer {
    //creamos una funcion llamadada compose q carga una varivles View
    public function compose(View $view) {
        //aqui lo que hacemos es llamar a las clase category y tag para usarla
        $categories = Category::orderBy("name", "ASC")->get();
        $tags       = Tag::orderBy("name", "ASC")->get();

        //y a la varivle $view le mandamos estas dos varivles con el metodo with()
        $view->
            with("categories", $categories)->
            with("tags", $tags);
    }
}
