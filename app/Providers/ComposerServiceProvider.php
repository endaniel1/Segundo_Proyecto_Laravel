<?php
//ahora todo est se crea cuando se ejecuta el comando para crear un nuevo provider
//aqui lo q hacmos es q tenemso q cargar el provider para luego usar la vista
namespace App\Providers;
//llamamos a las clases de laravel que nos dices para q funciones
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

//despues se crea una clases q extiende a la clase ServiceProvider como dice la docmuentacion
class ComposerServiceProvider extends ServiceProvider {
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    //el metodo boot() es el q se va a ejecutar primero
    public function boot() {
        //aqui lo q usamos es la clases  based de composer como la View
        //esta recive como parametro un array con las vistas que van a reciviran las varibles y como segundo parametro el nombre de en donde se va a crear la vista con composer o algo asi mas o menos
        View::composer(['front.index', "front.article"], "App\Http\ViewComposers\AsideComposer");
        //y para q todo esto funcione tenemos q agreagar en la carpeta config del proyecto el nombre de la clase de nuestro provider
        //para mas dudas revisar la documentacion mpara guiarse de lo q se hizo
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register() {
        //
    }
}
