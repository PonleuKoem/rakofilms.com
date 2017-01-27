<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Home;
use App\Http\Controllers\Controller;

class MoviesController extends Controller
{
    public function index(){
    	$products = Home::orderBy('id', 'DESC')
    						->where('active', 1)
    						->where('categories', 'movies')
    						->paginate(12);
    						//This is all can be delete and put active(); instean b.c we create it in Model
    	$pro = Home::orderBy('id', 'DESC')
    						->where('active', 1)    						
    						->limit(10)
    						->get();
    						//This is all can be delete and put active(); instean b.c we create it in Model
        $random = Home::where('active', 1)
                            ->where('categories', 'movies')
                            ->inRandomOrder()
                            ->limit(6)
                            ->get();
    	return view('pages.movies', compact('products', 'pro', 'random'));
    }
    /*public function recent(){
    	$pro = Home::orderBy('id', 'DESC')
    						->where('active', 1)
    						->where('categories', 'movies')
    						->paginate(10);
    						//This is all can be delete and put active(); instean b.c we create it in Model
    	return view('pages.movies', compact('pro'));
    }*/
}
