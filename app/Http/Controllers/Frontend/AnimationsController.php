<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Home;
use App\Http\Controllers\Controller;

class AnimationsController extends Controller
{
    public function index(){
    	$products = Home::orderBy('id', 'DESC')
    						->where('active', 1)
    						->where('categories', 'animations')
    						->paginate(12);
    	$random = Home::where('active', 1)
    						->where('categories', 'animations')
    						->inRandomOrder()
    						->limit(6)
    						->get();
    	return view('pages.animations', compact('products', 'random'));
    }
}
