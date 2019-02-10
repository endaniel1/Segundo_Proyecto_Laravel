<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTagsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('tags', function (Blueprint $table) {
            $table->increments('id');
            $table->string("name");
            $table->timestamps();
        });

        //ahaora vamos a crear una tabla pivote q es la q nos va a hacer la relacion de muchos a muchos
        //para crear un tabla de muchos a muchos se debe de crear el nombre de las tablas en forma simgular
        //si las tablas son: Articles y Tags = article y tag = article_tag
        Schema::create("article_tag", function (Blueprint $table) {
            $table->increments("id");
            $table->integer("article_id")->unsigned();
            $table->integer("tag_id")->unsigned();

            $table->foreign("article_id")->references("id")->on("articles")->onDelete("cascade");
            $table->foreign("tag_id")->references("id")->on("tags")->onDelete("cascade");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('article_tag');
        Schema::dropIfExists('tags');
    }
}
