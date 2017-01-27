<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Home;
use App\Slides;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(){
    	$movies =Home::orderBy('id', 'DESC')
    						->where('active', 1)
    						->paginate(6);
        $hmovies=Home::orderBy('id', 'DESC')
                            ->where('active', 1)
                            ->where('categories', 'movies')
                            ->paginate(6);
    	$animations=Home::orderBy('id', 'DESC')
                            ->where('active', 1)
                            ->where('categories', 'animations')
                            ->paginate(6);
        $random = Home::where('active', 1)
                            ->inRandomOrder()
                            ->limit(12)
                            ->get();
        $slides = Slides::orderBy('ID', 'DESC')
                            ->where('active', 1)
                            ->limit('5')
                            ->get();
        return view('pages.home', compact('movies', 'hmovies', 'animations', 'random', 'slides'));
    }
    /*++++++++++++++++++++++++++++++++++++++++++++++++++++ Search */
    public function search_result(Request $request){
    	$Search = $request->search_result;
    	$movies = Home::orderBy('id', 'DESC')
    						->where('active', 1)
    						->where('title', 'like',"%$Search%")
    						->paginate(24);
        $random = Home::where('active', 1)
                            ->inRandomOrder()
                            ->limit(12)
                            ->get();                   
    	
        return view('pages.moviespages', compact('movies', 'random'))->with('message', 'Search');					
    }
      /*++++++++++++++++++++++++++++++++++++++++++++++++++++ Search */
      public function animations(){
        /*$now = date('Y-m-d');*/
        $movies =Home::orderBy('id', 'DESC')
                            ->where('active', 1)                            
                            ->where('categories', 'animations')
                            ->paginate(6);
        $random = Home::where('active', 1)
                            ->inRandomOrder()
                            ->limit(12)
                            ->get();              
        return view('pages.moviespages', compact('movies', 'random'))->with('message', 'Adnimations');
      }
      public function hmovies(){
        /*$now = date('Y-m-d');*/
        $movies =Home::orderBy('id', 'DESC')
                            ->where('active', 1)                            
                            ->where('categories', 'movies')
                            ->paginate(24);
        $random = Home::where('active', 1)
                            ->inRandomOrder()
                            ->limit(12)
                            ->get();              
        return view('pages.moviespages', compact('movies', 'random'))->with('message', 'filmMovies');
      }

      public function allmovies(){
        /*$now = date('Y-m-d');*/
        $movies =Home::orderBy('id', 'DESC')
                            ->where('active', 1)
                            ->paginate(24);
        $random = Home::where('active', 1)
                            ->inRandomOrder()
                            ->limit(12)
                            ->get();              
        return view('pages.moviespages', compact('movies', 'random'))->with('message', 'All');
      }

      public function add_today(){
        /*$now = date('Y-m-d');*/
        $movies =Home::orderBy('id', 'DESC')
                            ->whereRaw('Date(created_date) = CURDATE()')
                            ->paginate(24);
        $random = Home::where('active', 1)
                            ->inRandomOrder()
                            ->limit(12)
                            ->get();              
        return view('pages.moviespages', compact('movies', 'random'))->with('message', 'Today');
      }

}
