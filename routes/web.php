<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */
//rutas del fronted
Route::get('/', [
    "as"   => "front.index",
    "uses" => "FrontController@index",
]);

Route::get("categories/{name}", [
    "uses" => "FrontController@buscadorCategory",
    "as"   => "front.buscador.category",

]);

Route::get("tags/{name}", [
    "uses" => "FrontController@buscadorTag",
    "as"   => "front.buscador.tag",

]);

Route::get("articles/{slug}", [
    "uses" => "FrontController@viewArticle",
    "as"   => "front.view.article",
]);
//definimos un grupo de ruotas
//le passamos un prefico q en este caso es sea admin
//mandomos a una ruta de tioo modificar o q tenga aciones de modificar
//buscar la documentacion de larvel de toda maneras
//y estas son las rutas para el panel de administracion
Route::group(["prefix" => "admin", "middleware" => "auth"], function () {

    Route::get("/", ["as" => "admin.index", function () {
        return view('admin.index');
    }]);

    //como primer pararametro q resive es la url a ala q vamos y despues el controlador
    Route::resource("users", "UsersController"); //users para entar y segundo parametro el controlador, y con el @ le indicamos el metodo q queremos q se ejecute
    Route::get("users/{id}/destroy", [
        "uses" => "UsersController@destroy",
        "as"   => "admin.users.destroy",
    ]); //esta es la ruta de eliminacio de usuarios

    //rutas de categorias
    Route::resource("categories", "CategoriesController");
    Route::get("categories/{id}/destroy", [
        "uses" => "CategoriesController@destroy",
        "as"   => "admin.categories.destroy",

    ]);
    //rutaas de tags
    Route::resource("tags", "TagsController");
    Route::get("tags/{id}/destroy", [
        "uses" => "TagsController@destroy",
        "as"   => "admin.tags.destroy",

    ]);
    //rutas de articles
    Route::resource("articles", "ArticlesController");
    Route::get("articles/{id}/destroy", [
        "uses" => "ArticlesController@destroy",
        "as"   => "admin.articles.destroy",

    ]);
    //
    Route::get("images", [
        "uses" => "ImagesController@index",
        "as"   => "admin.images.index",
    ]);
});

/*
//asi se define una ruta
//pueden ser de tipo post get enttre otras
//lo q se coloca entre {} es un parametro q se se le pasa
//y aqui en este caso es la ruta de articles/
Route::get("articles/{nombre?}", function ($nombre = "No Coloco Nombre") {
//aqui lo q vamos a hacer con esta ruta o q vamoa a mostrar
echo 'El nombre que haz colocado: ' . $nombre;
});
 */
/*
Route::get("articles",[
"as"=> "articles",
"users"=>"UserController@index"
]);
 */
//grupo de rutas

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
