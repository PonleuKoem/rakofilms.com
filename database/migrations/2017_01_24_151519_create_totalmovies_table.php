<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTotalmoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_resolutions', function(Blueprint $table){
            $table->increments('id');
            $table->string('resolution', '255');
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::create('tbl_statuses', function(Blueprint $table){
            $table->increments('id');
            $table->string('status', '255');
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::create('tbl_categories', function(Blueprint $table){
            $table->increments('id');
            $table->string('category', '255');
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        
        Schema::create('tbl_movies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('movie_title','255');
            $table->string('movie_description','255');
            $table->string('url','1000');
            $table->string('imagePath','255');
            $table->string('country', '255');
            $table->string('language', '255');
            $table->string('year', '4');
            $table->integer('category_id')->unsigned();
            $table->integer('resolution_id')->unsigned();
            $table->integer('status_id')->unsigned();
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('tbl_movies', function ($table) {
            $table->foreign('resolution_id')->references('id')->on('tbl_resolutions');
            $table->foreign('status_id')->references('id')->on('tbl_statuses');
            $table->foreign('category_id')->references('id')->on('tbl_categories');
        });
        Schema::create('tbl_genres', function (Blueprint $table) {
            $table->increments('id');
            $table->string('genre', '255');
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::create('tbl_movies_genres', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('movie_genre_id')->unsigned();
            $table->integer('genre_id')->unsigned();
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('tbl_movies_genres', function ($table) {
            $table->foreign('movie_genre_id')->references('id')->on('tbl_movies');
            $table->foreign('genre_id')->references('id')->on('tbl_genres');
        });
        Schema::create('tbl_slides', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', '255');
            $table->string('description', '255');
            $table->string('src', '1000');
            $table->boolean('active');
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tbl_movies');
        Schema::drop('tbl_resolutions');
        Schema::drop('tbl_statuses');
        Schema::drop('tbl_movies_genres');
        Schema::drop('tbl_genres');
        Schema::drop('tbl_slides');
        Schema::drop('tbl_categories');
    }
}
