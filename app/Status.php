<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
     protected $table = 'tbl_statuses';

     public function movies(){
     	return $this->hasMany('App\Movie');
     }
}
