<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class UsersController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //y este es el metodo inicial
    public function index() {
        //orderBy le pasamos por donde quiere q se ordene y de sengundo parametro de q forma en este caso por el id de forma acendente
        $users = User::orderBy("id", "ASC")->paginate(5); //paginate como queremos q se pagine
        //retornamos a una vista y con with es para crear una varible y pasarsela a las vista, es mas facil de pasarle una varible a una vista es una de tantas formas
        return view("admin.users.index")->with("users", $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //este es el metodo de creacion
    public function create() {
        return view("admin.users.create"); //retornamos a la vista sigueinte
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

//funcion q ejecuta el registro y el request q valida los campos como parametro
    public function store(UserRequest $request) {
        //dd($request->all());
        $user           = new User($request->all());
        $user->password = bcrypt($request->password); //antes de enviar se tiene q encritar la contraseña q se puede hacer de esta manera
        //dd($user->type);

        //con el paquete flash se pueden tener los mensaje de forma mas facil, para vistas este es el mensaje de q ocurrio algo
        //revisar la documentacion de laracasts/flash
        flash("Se a Registrado '" . $user->name . "' de Forma Exictosa¡")->success(); //y con el paquete flash mandamos un mensajito si se elimino a el usuario

        $user->save(); //guardamos en la vace de datos

        return redirect()->route("users.index"); //aqui redirecionamos a una ruta de q en este caso es la de index
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
    //metodo de edicion
    public function edit($id) {
        //dd($id);
        $user = User::find($id);
        return view("admin.users.edit")->with("user", $user); //retornamos a una vista y con el metodo with asigamos una varible o se la pasamos
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
        //dd($request->all());
        //dd($id);

        $user = User::find($id); //bucamos a el usuario en la base de datos por el id
        //ahora las varibles q le estamos enviado par a modificar las sustituimos por la q buscamos en la base de datos

        //$user        = fill($request->all()); //tambien se puede hacer asi lo q hace fill es q remplza los valores de un objeto por este otro
        $user->name  = $request->name;
        $user->email = $request->email;
        $user->type  = $request->type;

        $user->save(); //y ahaora las guardamos nuevamente con el metodo save()
        //dd($user);

        flash("El Usuario '" . $user->name . "' Fue Editado con Exito¡")->warning(); //y con el paquete flash mandamos un mensajito si se elimino a el usuario

        return redirect()->route("users.index"); //aqui redirecionamos a una ruta de q en este caso es la de index
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
        $user = User::find($id); //buscamos a el usuario por el id
        $user->delete(); //con el metodo delete elimamanos a el ususraio

        flash("El Usuario '" . $user->name . "' A sido Eliminado Exitosamente¡")->error(); //y con el paquete flash mandamos un mensajito si se elimino a el usuario

        return redirect()->route("users.index"); //aqui redirecionamos a una ruta de q en este caso es la de index
    }

}
