<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    protected $table = 'tbl_product';
    /*public function ScopeActive($query){
    	return $query->orderBy('id', 'DESC')
    						->where('active', 1)
    						->where('type', 'movies')
    						->get();
    */
}
