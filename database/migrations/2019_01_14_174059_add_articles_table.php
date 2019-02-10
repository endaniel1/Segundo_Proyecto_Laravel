<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddArticlesTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string("title");
            $table->text("content");
            $table->integer("user_id")->unsigned();
            $table->integer("category_id")->unsigned();

            //asi se hace la relacion de uno a muchos de la table que creamos
            //q en este caso es la de articles a la tabla users
            $table->foreign("user_id")->references('id')->on('users')->onDelete("cascade");
            $table->foreign("category_id")->references('id')->on('categories')->onDelete("cascade");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('articles');
    }
}
