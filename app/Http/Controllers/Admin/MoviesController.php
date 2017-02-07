<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\http\Requests\MoviesRequest;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\facades\File;
use Illuminate\Support\facades\Storage;
use DB;
use Image;
use View;
use Session;
use Input;
use App\Movie;
use Carbon\Carbon;
use App\Genre;
use App\MovieGenre;


class MoviesController extends Controller
{
    private $status;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $movie = Movie::all();
        $moviegenre = MovieGenre::all();

    }
    public function index()
    {
        $movie = Movie::OrderBy('id', 'DESE')->paginate(10);
        return View::make('admin.pages.movie')
            ->with('movie', $movie);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MoviesRequest $request)
    {
        
        /*dd($request);*/
        /*$moviegenre = array_values(input::get('genre_id'));*/
        $movie = new Movie;

        $movie_title = $request->input('movie_title');
        $movie_description = $request->input('movie_description');
        $url = $request->input('url');
        $imagePath = $request->input('imagePath');
        $country = $request->input('country');
        $language = $request->input('language');
        $year = $request->input('year');
        $resolution_id = $request->input('resolution_id');
        $category_id = $request->input('category_id');
        $status_id = $request->input('status_id');
        $created_at = Carbon::now();
        $updated_at = Carbon::now();
        if($request->hasFile('imagePath')){
            $imagePath = $request->file('imagePath');
            $filename = time() . '.' . $imagePath ->getClientOriginalExtension();
            $location = public_path('uploads/movies/' .$filename);
            Image::make($imagePath)->resize(250, 372)->save($location);

            $movie -> imagePath = $filename;
        }

        $data= array('movie_title' => $movie_title, 'movie_description'=> $movie_description, 'url' => $url, 'country' => $country,'imagePath' => $filename, 'language' => $language, 'year' => $year, 'resolution_id' => $resolution_id, 'status_id' => $status_id,'created_at' => $created_at, 'category_id'=>$category_id, 'updated_at' => $updated_at);
        $movie->insert($data);
        /*$movie->MovieGenre()->attach($moviegenre);*/
        
        return redirect('/cms/movies')->with('message', '<div class="alert alert-success">
                                              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                              <strong class="text-center">Insert Successfully</strong>.
                                            </div>');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        /*dd($request);*/
            $movie = Movie::findorfail($id);
            /*$moviesgenre = array_values(input::get('genre_id'));*/
            $movie->movie_title       = Input::get('movie_title');
            $movie->movie_description       = Input::get('movie_description');
            $movie->url       = Input::get('url');
            $movie->country       = Input::get('country');
            $movie->language       = Input::get('language');
            $movie->category_id       = Input::get('category_id');
            $movie->year       = Input::get('year');
            $movie->resolution_id       = Input::get('resolution_id');
            $movie->status_id       = Input::get('status_id');
            $movie->updated_at = Carbon::now();
            $movie->update();
            /*$movie->pivot-> sync($moviesgenre);*/

            // redirect
            Session::flash('message', '<div class="alert alert-success">
                                              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                              <strong class="text-center">Updated Successfully</strong>.
                                            </div>');
            return Redirect::back();
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         // delete
        $status = Movie::find($id);
        $status->status_id       = 3;
        $status->updated_at = Carbon::now();
        $status->update();

        // redirect
        Session::flash('message', '<div class="alert alert-warning">
                                              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                              <strong class="text-center">Deleted Successfully</strong>.
                                            </div>');
        return Redirect::back();
    }    
    
}
