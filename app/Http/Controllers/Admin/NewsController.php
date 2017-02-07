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
use App\News;
use Carbon\Carbon;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::all();
        return View::make('admin.pages.news')
            ->with('news', $news);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dataI = DB::table('tbl_news');
        $this->validate($request, [
            'title' => 'required|min:2|max:1000',
            'descriptions' => 'required',
            'contents' => 'required',
            'img' => 'required|min:10|max:1000',          


            ]);
        
 
        $title = $request->input('title');
        $descriptions = $request->input('descriptions');
        $contents = $request->input('contents');
        $img = $request->input('img');
       /* Insert data with plugin image intervention
        ==========================================================
       */
            if($request->hasFile('img')){
                $img = $request->file('img');
                $filename = time() . '.' . $img ->getClientOriginalExtension();
                $location = public_path('images/' .$filename);
                Image::make($img)->resize(182, 268)->save($location);

                $dataI -> img = $filename;
            }
            $active = $request->input('active');
            $created_at = $request->input('created_at');
            $updated_at = $request->input('updated_at');

            $data= array('title' => $title, 'contents'=> $contents, 'descriptions'=> $descriptions, 'img' => 
                $filename, 'active' => $active, 'created_at' => $created_at, 'updated_at' => $updated_at);

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

            return redirect('/cms/news')->with('message', 'News has been created successfully');
       
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
            'img' => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('cms/news')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $news = News::find($id);
            $news->title       = Input::get('title');
            $news->contents       = Input::get('title');
            $news->descriptions      = Input::get('descriptions');
            $news->img = Input::get('img');
            $news->updated_at = Carbon::now();
            $news->save();

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
        $news = News::find($id);
        $news->delete();

        // redirect
        Session::flash('message', 'Successfully deleted!');
        return Redirect::back();
    }
}
