<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\http\Requests\GenresRequest;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Redirect;
use DB;
use Image;
use View;
use Session;
use Input;
use App\Genre;
use Carbon\Carbon;

class GenresController extends Controller
{
    private $genres;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $genres = Genre::all();
    }
    public function index()
    {
        $genres = Genre::all();
        return View::make('admin.pages.genre')
            ->with('genres', $genres);
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
    public function store(GenresRequest $request)
    {
        $genres = new Genre;
        $genres -> genre = $request->genre;
        $genres -> created_at = Carbon::now();
        $genres -> updated_at = Carbon::now();
        $genres->save();
        return redirect('/genres')->with('message', 'Data inserted');
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
           // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'genre'       => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('/genres')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $genres = Genre::find($id);
            $genres->genre       = Input::get('genre');
            $genres->updated_at = Carbon::now();
            $genres->save();

            // redirect
            Session::flash('message', 'Successfully updated!');
            return Redirect::back();
        }
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
        $slides = Genre::find($id);
        $slides->delete();

        // redirect
        Session::flash('message', 'Successfully deleted!');
        return Redirect::back();
    }
}
