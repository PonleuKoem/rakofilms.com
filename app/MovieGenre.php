<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MovieGenre extends Model
{
     protected $table = 'tbl_movie_genre';

     /*public function movies(){
     	return $this ->hasMany('App\Movie');
     }
     public function genres(){
     	return $this ->hasMany('App\Genre');
     }*/
}
