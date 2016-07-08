<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('path');
            $table->string('cast');
            $table->string('direction');
            $table->string('duration');
            $table->timestamps();

            //aqui se asigna la clave foranea de la taabla genres
            $table->integer('genre_id')->unsigned();
            $table->foreign('genre_id')
            ->references('id')//referencia a el id 
            ->on('genres')//de la tabla genres
            ->onDelete('cascade');//si se elimina el id de la tabla genres tambien se elimina aqui
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('movies');
    }
}
