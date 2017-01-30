<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Home;
use App\Movie;
use App\Http\Controllers\Controller;

class MoviesController extends Controller
{
    public function __construct(){
        
    }
    	public function index(){
        $home =Movie::orderBy('id', 'DESC')->where('status_id', 2)->paginate(6);
        $animation =Movie::orderBy('id', 'DESC')->where('status_id', 2)->where('category_id', 1)->paginate(6);
        $movie =Movie::orderBy('id', 'DESC')->where('status_id', 2)->where('category_id', 2)->paginate(6);
        $random = Movie::where('status_id', 2)->inRandomOrder()->limit(12)->get();
        $slides = Slides::orderBy('ID', 'DESC')->where('active', 1)->limit('5')->get();
        return view('pages.home', compact('home','movie', 'animation', 'random', 'slides'));
    }
    /*++++++++++++++++++++++++++++++++++++++++++++++++++++ Search */
    public function search_result(Request $request){
        $Search = $request->search_result;
        $movies =Movie::orderBy('id', 'DESC')->where('status_id', 2)->where('movie_title', 'like',"%$Search%")->paginate(24);
        $random = Movie::where('status_id', 2)->inRandomOrder()->limit(12)->get();                    
        
        return view('pages.moviespages', compact('movies', 'random'))->with('message', 'Search')->with('allert', '<div class="alert alert-success">
                                              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                              <strong class="text-center">Thanks for Your Subcription</strong>.
                                            </div>');                   
    }
      /*++++++++++++++++++++++++++++++++++++++++++++++++++++ Search */
      public function animations(){
        /*$now = date('Y-m-d');*/
        $movies =Movie::orderBy('id', 'DESC')->where('status_id', 2)->where('category_id', 1)->paginate(24);
        $random = Movie::where('status_id', 2)->inRandomOrder()->limit(12)->get();
        return view('pages.moviespages', compact('movies', 'random'))->with('message', 'Adnimations');
      }
      public function hmovies(){
        /*$now = date('Y-m-d');*/
        $movies =Movie::orderBy('id', 'DESC')->where('status_id', 2)->where('category_id', 2)->paginate(24);
        $random = Movie::where('status_id', 2)->inRandomOrder()->limit(12)->get();     
        return view('pages.moviespages', compact('movies', 'random'))->with('message', 'filmMovies');
      }

      public function allmovies(){
        /*$now = date('Y-m-d');*/
        $movies =Movie::orderBy('id', 'DESC')->where('status_id', 2)->paginate(24);
        $random = Movie::where('status_id', 2)->inRandomOrder()->limit(12)->get();             
        return view('pages.moviespages', compact('movies', 'random'))->with('message', 'All');
      }

      public function add_today(){
        /*$now = date('Y-m-d');*/
        $movies =Movie::orderBy('id', 'DESC')->where('status_id', 2)->whereRaw('Date(created_at) = CURDATE()')->paginate(24);
        $random = Movie::where('status_id', 2)->inRandomOrder()->limit(12)->get();              
        return view('pages.moviespages', compact('movies', 'random'))->with('message', 'Today');
      }
}
