<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Home;
use App\Http\Controllers\Controller;

class SingleController extends Controller
{
   public function index(){
    }
    public function show($id){
    	$movies = Home::where('id', $id)
                        ->where('active', 1)
                        ->first();
    	$sim = Home::inRandomOrder()
    					->where('active', 1)
    					->limit(10)
    					->get();
       	return view('pages.singlepost', compact('movies', 'sim'));
    }
    
}
