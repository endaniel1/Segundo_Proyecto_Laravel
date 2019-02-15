<?php

namespace App\Http\Controllers;

use App\Http\Requests\TagRequest; //aqui a su reques corespondiente
use App\Tag; //llamamos a la clase tag
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class TagsController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        //con una varible request utilizamos el buscador
        //llamaos el buscador del model y le pasamos la request para buscarlos

        //orderBy le pasamos por donde quiere q se ordene y de sengundo parametro de q forma en este caso por el id de forma acendente
        $tags = Tag::Buscador($request->name)->orderBy("id", "ASC")->paginate(2); //paginate como queremos q se pagine

        //retornamos a una vista y con with es para crear una varible y pasarsela a las vista, es mas facil de pasarle una varible a una vista es una de tantas formas
        //dd($tags);
        return view("admin.tags.index")->with("tags", $tags);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view("admin.tags.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagRequest $request) {
        $tag = new Tag($request->all());
        $tag->save(); //guardamos en la vace de datos

        //con el paquete flash se pueden tener los mensaje de forma mas facil, para vistas este es el mensaje de q ocurrio algo
        //revisar la documentacion de laracasts/flash
        flash("El Tag '" . $tag->name . "'Ha Sido Creado de Forma Exictosa¡")->success(); //y con el paquete flash mandamos un mensajito si se elimino a el usuario

        return redirect()->route("tags.index"); //aqui redirecionamos a una ruta de q en este caso es la de index
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
    public function edit($id) {
        $tag = Tag::find($id); //buscamos el tag por su id
        return view("admin.tags.edit")->with("tag", $tag);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {

        $tag = Tag::find($id);
        $tag->fill($request->all()); //fill lo q hace es q remplaza los tados de un objeto por otro
        $tag->save();

        flash("El Tag '" . $tag->name . "' Fue Editado con Exito¡")->warning(); //y con el paquete flash mandamos un mensajito si se elimino a el usuario

        return redirect()->route("tags.index"); //aqui redirecionamos a una ruta de q en este caso es la de index
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //dd($id);
        $tag = Tag::find($id); //buscamos a el usuario por el id
        $tag->delete(); //con el metodo delete elimamanos a el ususraio

        flash("El Tag '" . $tag->name . "' A sido Eliminado Exitosamente¡")->error(); //y con el paquete flash mandamos un mensajito si se elimino a el usuario

        return redirect()->route("tags.index"); //aqui redirecionamos a una ruta de q en este caso es la de index
    }
}
