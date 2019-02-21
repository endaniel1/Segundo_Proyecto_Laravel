<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable {
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'type',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //establecemos la relacion con articles
    public function articles() {
        $this->hashMany("App\Article");
    }
    //este metodo lo q hace es si el usuario es de tipo admin nos devolvera true
    //lo vamos a utilizar en el middleware
    public function admin() {
        return $this->type === "admin";
    }
}
