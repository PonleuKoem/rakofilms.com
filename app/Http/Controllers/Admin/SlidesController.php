<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Redirect;
use DB;
use Image;
use View;
use Session;
use Input;
use App\Slides;

class SlidesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slides = Slides::all();
        return View::make('admin.pages.slides')
            ->with('slides', $slides);
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
    public function store(Request $request)
    {
        $dataI = DB::table('tbl_slides');
        $this->validate($request, [
            'title' => 'required|min:2|max:120',
            'description' => 'required',
            'src' => 'required',          


            ]);
        

        
       $title = $request->input('title');
        $description = $request->input('description');
        $src = $request->input('src');
       /* Insert data with plugin image intervention
        ==========================================================
       */
        if($request->hasFile('src')){
            $src = $request->file('src');
            $filename = time() . '.' . $src ->getClientOriginalExtension();
            $location = public_path('images/' .$filename);
            Image::make($src)->resize(1300, 500)->save($location);

            $dataI -> src = $filename;
        }
        $active = $request->input('active');
        $create_date = $request->input('created_date');
        $update_at = $request->input('updated_at');

        $data= array('title' => $title, 'description'=> $description, 'src' => 
            $filename, 'active' => $active, 'created_date' => $create_date, 'updated_at' => $update_at);

        $dataI->insert($data); 
      /*  $movie = new Home;
        $movie -> title = $request->title;
        $movie -> description = $request->description;
        $movie -> url = $request->url;
        $movie -> years = $request->years;
        $movie -> img = $request->img;
        $movie -> type = $request->type;
        $movie -> create_date = $request->create_date;
        $movie -> update_at = $request->update_at;
        $movie->save();*/

        return redirect('/slides')->with('message', 'Slides Created successfully');
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
            'title'       => 'required',
            'description'      => 'required',
            'src' => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('slides/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $pro = Slides::find($id);
            $pro->title       = Input::get('title');
            $pro->description      = Input::get('description');
            $pro->src = Input::get('src');
            $pro->save();

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
        $slides = Slides::find($id);
        $slides->delete();

        // redirect
        Session::flash('message', 'Successfully deleted!');
        return Redirect::back();
    }
}
