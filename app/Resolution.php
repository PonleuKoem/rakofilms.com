<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resolution extends Model
{
     protected $table = 'tbl_resolutions';

     public function movies(){
     	return $this->hasMany('App\Movie');
     }
}
