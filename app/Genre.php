<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
     protected $table = 'tbl_genres';

     public function movies(){
     	return $this -> belongsToMany('App\Movie', 'movie_genre', 'movie_id', 'genre_id');
     }
}
