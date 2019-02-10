<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImagesTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('images', function (Blueprint $table) {
            $table->increments('id');
            $table->string("name");
            $table->integer("article_id")->unsigned();

            //asi se hace la relacion de uno a muchos de la table que creamos
            //q en este caso es la de images a la tabla articles
            $table->foreign("article_id")->references("id")->on("articles")->onDelete("cascade");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('images');
    }
}
