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
use Carbon\Carbon;

class SlidesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slide = Slides::OrderBy('id', 'DESC')->paginate(10);
        return View::make('admin.pages.slides')
            ->with('slide', $slide);
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
            $location = public_path('uploads/slides/' .$filename);
            Image::make($src)->resize(1300, 500)->save($location);

            $dataI -> src = $filename;
        }
        $active = $request->input('1');
        $created_at = Carbon::now();
        $updated_at = Carbon::now();

        $data= array('title' => $title, 'description'=> $description, 'src' => 
            $filename, 'active' => 1, 'created_at' => $created_at, 'updated_at' => $updated_at);

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

        return redirect('/cms/slides')->with('message', '<div class="alert alert-success">
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
            $slide = Slides::findorfail($id);
            /*$moviesgenre = array_values(input::get('genre_id'));*/
            $slide->title       = Input::get('title');
            $slide->description       = Input::get('description');
            $slide->updated_at = Carbon::now();
            $slide->update();
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
        $slides = Slides::find($id);

        $slides->active       = 1;
        $slides->updated_at = Carbon::now();
        $slides->update();

        // redirect
        Session::flash('message', '<div class="alert alert-warning">
                                              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                              <strong class="text-center">Deleted Successfully</strong>.
                                            </div>');
        return Redirect::back();
    }
}
