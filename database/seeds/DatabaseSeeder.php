<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        //lo q hacemos aqui es q con el metdo call() mandamos a llamar a el seeder q acabamos de crear llamado UserSeeder con su clases
        //esto lo q haces es q cuando vamos a ejecutar el comando llamae a este seeds  o a muchos de los q tengamos
        $this->call(UserSeeder::class);
    }
}
