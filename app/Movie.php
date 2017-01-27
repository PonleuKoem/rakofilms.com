<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
     protected $table = 'tbl_movies';
     public function status(){
     	return $this->belongsTo('App\Status');
     }
    
     public function resolution(){
     	return $this->belongsTo('App\Resolution');
     }
}
