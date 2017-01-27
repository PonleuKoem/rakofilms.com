<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News;
class NewsController extends Controller
{
	public function index(){
    $news = News::orderby('ID', 'DESC')
    					->where('active', 1)
    					->paginate(10);

    return view('pages.news', compact('news'));
	}
	public function singlenews($id){
		$singlenews = News::where('id', $id)
							->first();
       	return view('pages.singlenews', compact('singlenews'));
	}
}
