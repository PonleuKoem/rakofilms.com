<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Home;

class PostController extends Controller
{
   public function index(){
    	$products = Home::all();
    
    	return view('pages.singlepost', compact('products'));
    }
    public function show($id){
    	$products = Home::where('id', $id)->where('active', 1)->first();
    	$upnexts = Home::inRandomOrder()
    					->where('active', 1)
    					->limit(12)
    					->get();
       	return view('pages.singlepost', compact('products', 'upnexts'));
    }
    
}
