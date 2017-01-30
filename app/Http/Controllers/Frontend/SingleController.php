<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Movie;
use App\Http\Controllers\Controller;

class SingleController extends Controller
{
   public function index(){
    }
    public function show($id){
    	$movies = Movie::where('id', $id)->where('status_id', 2)->first();
    	$sim = Movie::inRandomOrder()->where('status_id', 2)->limit(10)->get();
    	$random = Movie::where('status_id', 2)->inRandomOrder()->limit(12)->get();
       	return view('pages.singlepost', compact('movies', 'sim', 'random'));
    }
    
}
