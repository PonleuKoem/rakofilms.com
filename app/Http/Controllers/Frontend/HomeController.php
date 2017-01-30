<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Home;
use App\Slides;
use App\Movie;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(){
    	$home =Movie::orderBy('id', 'DESC')->where('status_id', 2)->paginate(6);
        $animation =Movie::orderBy('id', 'DESC')->where('status_id', 2)->where('category_id', 1)->paginate(6);
        $movie =Movie::orderBy('id', 'DESC')->where('status_id', 2)->where('category_id', 2)->paginate(6);
        $random = Movie::where('status_id', 2)->inRandomOrder()->limit(12)->get();
        $slides = Slides::orderBy('id', 'DESC')->where('active', 1)->limit('5')->get();
        return view('pages.home', compact('home','movie', 'animation', 'random', 'slides'));
    }
}
