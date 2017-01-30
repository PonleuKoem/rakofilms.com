<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\http\Requests\ResolutionsRequest;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Redirect;
use DB;
use Image;
use View;
use Session;
use Input;
use App\Resolution;
use Carbon\Carbon;

class ResolutionsController extends Controller
{
    private $resolution;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $resolution = Resolution::all();
    }
    public function index()
    {
        $resolution = Resolution::all();
        return View::make('admin.pages.resolution')
            ->with('resolution', $resolution);
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
    public function store(ResolutionsRequest $request)
    {
        $reso = new Resolution;
        $reso -> resolution = $request->resolution;
        $reso -> created_at = Carbon::now();
        $reso -> updated_at = Carbon::now();
        $reso->save();
        return redirect('/cms/resolutions')->with('message', 'Data inserted');
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

            $reso = Resolution::find($id);
            $reso->resolution       = Input::get('resolution');
            $reso->updated_at = Carbon::now();
            $reso->save();

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
        $slides = Resolution::find($id);
        $slides->delete();

        // redirect
        Session::flash('message', 'Successfully deleted!');
        return Redirect::back();
    }
}
