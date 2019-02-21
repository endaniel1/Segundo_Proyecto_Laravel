<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Factory as Auth;
//utilizamos aqui la clase de larevel Auth

class Admin {
    /**
     * The authentication factory instance.
     *
     * @var \Illuminate\Contracts\Auth\Factory
     */
    protected $auth;

    /**
     * Create a new middleware instance.
     *
     * @param  \Illuminate\Contracts\Auth\Factory  $auth
     * @return void
     */
    //esto sale porque copiamos la q ya tenia laravel por defecto en la clases auth
    public function __construct(Auth $auth) {
        $this->auth = $auth;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    //aqui el metdo handel es el q se ejecuta primero
    public function handle($request, Closure $next) {
        if ($this->auth->user()->admin()) {
//aqui lo q hacemos es q verificamos si el usuario autentificado es de tipo admin y seguimos con el proceso
            return $next($request);
        } else { //y sino
            abort(401); //mandamos un abort 401 q es q nos muestra la vista de acceso denegado
        }

    }
}
