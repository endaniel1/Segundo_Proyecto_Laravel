<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        /*CREANDO UN SEEDS NORMAL*/

        //aqui lo q hago es q llamo a DB y le indico q utilize la table y esta resive como parametro el monbre de la tabla en forma de strincg q este caso es la tabla users
        //y con su metodo insert le digo q me inserte el siguinte usuario
        //este medto resive como parametro el nombre de la columna en forma de string y el valor q se le va a indicar a esta fila de regristro
        //esto lo hago para tenerme a mi como usuario principal
        DB::table("users")->insert([
            "name"     => "Enrique Rodriguez",
            "email"    => "enriq_1997@hotmail.com",
            "password" => bcrypt("123456"),
            "type"     => "admin",
        ]);

        /*CREANDO UN FACTORY SENCILLO*/

        //para llamar a un factoy se define  la funcion factory
        //luego se le pasa el modelo a el q vamos a  utilizar diciendo q son las clase luego la cantidad de vamos a crear de formar rando y despues el metdo create() para crear
        factory(App\User::class, 10)->create();
    }
}
