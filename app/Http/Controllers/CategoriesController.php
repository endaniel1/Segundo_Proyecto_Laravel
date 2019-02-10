<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;

class CategoriesController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $categories = Category::orderBy("id", "DESC")->paginate(2);

        return view("admin.categories.index")->with("categories", $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view("admin.categories.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request) {

        $category = new Category($request->all());

        //dd($category);

        $category->save();
        flash("Se a Creado la Categoria '" . $category->name . "' de Forma Exictosa¡")->success();
        return redirect()->route("categories.index");

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

        $categories = Category::find($id);

        return view("admin.categories.edit")->with("categories", $categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //metodo de actualizacion y resive como parametro el request para validar los datos y un id
    public function update(Request $request, $id) {

        $categories = Category::find($id);
        $categories->fill($request->all()); //fill lo q hace es q remplaza los tados de un objeto por otro
        $categories->save();

        flash("La Categorias '" . $categories->name . "' Fue Editado con Exito¡")->warning(); //y con el paquete flash mandamos un mensajito si se elimino a el usuario

        return redirect()->route("categories.index"); //aqui redirecionamos a una ruta de q en este caso es la de index
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //este es el metodo de ellimincacio resive como parametro un id
    public function destroy($id) {
        //dd($id);
        $category = Category::find($id); //buscamos a el usuario por el id
        $category->delete(); //con el metodo delete elimamanos a el ususraio

        flash("La Categoria '" . $category->name . "' A sido Eliminado Exitosamente¡")->error(); //y con el paquete flash mandamos un mensajito si se elimino a el usuario

        return redirect()->route("categories.index"); //aqui redirecionamos a una ruta de q en este caso es la de index
    }
}
