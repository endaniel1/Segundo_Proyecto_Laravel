<?php

namespace App\Http\Controllers;

use App\Article; //lamaamos a la clase articles para ususarla
use App\Category; //llamamos a la clase category para usarla
use App\Http\Requests\ArticlesRequest; //ellamaos a reques coreespondiente par validar los campos
use App\Image; //lamamos a la clase image para pobner usarla
use App\Tag; //llamamos a la clase tag para usarla
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class ArticlesController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response





     */
    public function index(Request $request) {
        //con una varible request utilizamos el buscador
        //llamaos el buscador del model y le pasamos la request para buscarlos

        //llamaos a la clase  article y buiscmos los articulos creado de forma dec por su id y q lo pagine por 5
        $articles = Article::Buscador($request->title)->orderBy("id", "DESC")->paginate(4);

        //para llamar a las relaciones lo q hacer de esta manera
        //con el metodo each lo q hace es hacer un recorrido por cada uno de los articulos y llamaos despues a su relaciones de cada uno de los articulos
        $articles->each(function ($articles) {
            $articles->category;
            $articles->user;
        });
        //dd($articles);
        return view("admin.articles.index")->with("articles", $articles); //retonamos a la vista articles.index y le para sapamos como parmetro los articulos con width
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //pluck lo q hace es crear un listado en este caso de la categorias y le pasamo como parametro el nombre de la columnna a q quiere buscar en este caso el iname y id de las categorias guardadas
        $categories = Category::orderBy("name", "ASC")->pluck("name", "id");
        //dd($categories);

        $tags = Tag::orderBy("name", "ASC")->pluck("name", "id");

        return view("admin.articles.create")->with("categories", $categories)->with("tags", $tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticlesRequest $request) {
        //manipulacion de imagenes

        if ($request->file('image')) {
            $file = $request->file('image'); //con el metodo file traemos todo los datos correspondiente a la imgane q estamos enviado resive como parametro el nombre del input correspondiente a la imagen

            //generamos el njombre de nuestra imagen
            //q tiene el time() q es el tiempo en q fue creada
            //seguidamente un . para luego concadedarla con la extencion de nuestra imagen con la funcion getClientOriginalExtension()
            $nameimagen = "ImageCodigoFacilito_" . time() . "." . $file->getClientOriginalExtension();

            $path = public_path() . "/images/articles/"; //esta funcion lo que hace es traer la ruta en la q estamos con nuetros proyecto

            //movemos la imagen con el metodo move() q resive como parametro la ruta y el nombre de la imagen q en nuestro caso la tenosmos ya guardada es las varibles correspondiente
            $file->move($path, $nameimagen); //esto de una vez guarda la imagen en nuestro proyecto
            //dd($file);
        }

        //creamos un nuevo objeto de clase article y con los dostos q enviamos del request se le coloca o se guardes
        $articles          = new Article($request->all());
        $articles->user_id = \Auth::user()->id; //con la clase Auth vemos cual es el ususario q esta logiado y buscamos su id para luego guardale a el user_i del ariicle
        $articles->save(); //aqui guardamos en la tabla articles

        //es llamaos al metdo tags del model articles y despues sincronizamos con el metodo sync los tags q se estan enviando del formulario, porque asi porque esa resive un array comm parametro
        $articles->tags()->sync($request->tags);

        //creamos una nuevo objeto de la clase Image
        $image       = new Image();
        $image->name = $nameimagen; //AQUI LO Q HACEMOS ES Q AL NOMBRE DE LA IMAGEN VA HACER AL NOMBRE DE LA IMAGEN Q ESTA ARRIBA CREADA
        $image->article()->associate($articles); //despues entramos a el metdo del modelo q en esta caso es article() y con el metdo associate() asociamos todo los articulos q q van con la imagen
        $image->save(); //aqui guardamos la imagen
        //dd($articles);

        flash("Se a Creado el Artículo '" . $articles->title . "' de Forma Exictosa¡")->success(); //y con el paquete flash mandamos un mensajito si se elimino a el usuario

        return redirect()->route("articles.index"); //redirecionamos a la ruta del index

        //fin de la manipulacion de imagen
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //metodo d edicion
    public function edit($id) {

        $article = Article::find($id); //utilizamos la clase article y buscamos el articulo por el id q estamos utilizado con el metdo find

        $article->category; //buscamos la relacion q tiene con los articulos con el metdo category q tiene relacionado

        $categories = Category::orderBy("name", "DESC")->pluck("name", "id"); //utilizamops la clase category
        //y buscamos con el metodo ordeBy() por el name de forma descendente
        //y q no los listes con el metodo pluck() listamos los datos q resivimos pero q tenga el name y el id corrempondiente a el

        $tags = tag::orderBy("name", "DESC")->pluck("name", "id");
        //utilizamops la clase tag
        //y buscamos con el metodo ordeBy() por el name de forma descendente
        //y q no los listes con el metodo pluck() listamos los datos q resivimos pero q tenga el name y el id corrempondiente a el

        $mi_tags = $article->tags->pluck("id")->ToArray();
        //ahora nesecitamos los tag correspondiente a el tag q vamos a editar
        //y los tado q nos los liste con el metdo pluck() q lo listamos por su id
        //y como nos traae todavia un objeto con el metdo ToArray() cambiamos de un objeto a un array
        //y todo eso lo guardamos a una varible q tenga los datos de los tags de nuestro articulo
        //dd($mi_tags);

        //aqui retonamos a una vista con las varibles q ya creamos anteriormente con el metodo with
        return view("admin.articles.edit")
            ->with("categories", $categories)
            ->with("article", $article)
            ->with("tags", $tags)
            ->with("mi_tags", $mi_tags);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //metodo de actualizar
    public function update(Request $request, $id) {
        //dd($request->all());
        $article = Article::find($id); //utilizamos la clase articles y buscmoas el articulo con el metodo find

        $article->fill($request->all()); //despues con el metodo fill remplazamos los datdos de nuestros objeto con el nuevo objeto q le estamos pasaondo del request
        $article->save(); //despues guardamos con el metodo save

        //aqui la parte de la realcion
        //con el metdo tags() del modelo utilizamos el metodo sync() q remplaza los datos o atualiza y le pasamos los tagas nuevos q quqremos q tenga
        $article->tags()->sync($request->tags);

        flash("El Artículo '" . $article->title . "' Fue Editado con Exito¡")->warning(); //y con el paquete flash mandamos un mensajito si se elimino a el usuario

        return redirect()->route("articles.index"); //aqui redirecionamos a una ruta de q en este caso es la de index
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //metdo q de eliminacio
    public function destroy($id) {
        $article = Article::find($id); //utilizamos la clase article y buscamos el articulo con el metodo find

        $article->delete(); //despues eliminamos con el metodo delete

        flash("El Artículo '" . $article->title . "' A sido Eliminado Exitosamente¡")->error(); //y con el paquete flash mandamos un mensajito si se elimino a el usuario

        return redirect()->route("articles.index"); //aqui redirecionamos a una ruta de q en este caso es la de index
    }
}
