<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\http\Requests\MoviesRequest;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Redirect;
use illuminate\Support\facades\File;
use illuminate\Support\facades\Storage;
use DB;
use Image;
use View;
use Session;
use Input;
use App\Movie;
use Carbon\Carbon;


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
    }
    public function index()
    {
        $movie = Movie::all();
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
        
        
        $movie = new Movie;
        $movie -> movie_title = $request-> movie_title;
        $movie -> movie_description = $request-> movie_description;
        $movie -> url = $request -> url;
        
        $movie -> country = $request -> country;
        $movie -> language = $request -> language;
        $movie -> year = $request -> year;
        $movie -> resolution_id= $request -> resolution_id;
        $movie -> status_id = $request -> status_id;
        $movie -> created_at = Carbon::now();
        $movie -> updated_at = Carbon::now();
        $movie->save();

        $file = $request -> file('imagePath');
        $filename = $request->  movie_title. '-' . $movie->id . '.jpg';
        if($file){
            Storage::disk('local')->put($filename, File::get($file));
        }
        return redirect('/cms/movies')->with('message', 'Data inserted');
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

            $status = Status::find($id);
            $status->status       = Input::get('status');
            $status->updated_at = Carbon::now();
            $status->save();

            // redirect
            Session::flash('message', 'Successfully updated!');
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
        $status = Status::find($id);
        $status->delete();

        // redirect
        Session::flash('message', 'Successfully deleted!');
        return Redirect::back();
    }
    public function getImage($filename){
    $file = Storage::disk('local')->get($filename);
    return new Response($file, 200);
}
    
}
