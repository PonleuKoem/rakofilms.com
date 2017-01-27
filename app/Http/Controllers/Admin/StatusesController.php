<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\http\Requests\StatusesRequest;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Redirect;
use DB;
use Image;
use View;
use Session;
use Input;
use App\Status;
use Carbon\Carbon;

class StatusesController extends Controller
{
    private $status;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $status = Status::all();
    }
    public function index()
    {
        $status = Status::all();
        return View::make('admin.pages.status')
            ->with('status', $status);
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
    public function store(StatusesRequest $request)
    {
        $status = new Status;
        $status -> status = $request->status;
        $status -> created_at = Carbon::now();
        $status -> updated_at = Carbon::now();
        $status->save();
        return redirect('/cms/statuses')->with('message', 'Data inserted');
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
}
