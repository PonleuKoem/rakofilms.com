<?php

namespace App\Http\Controllers\Test;
use App\Home;
use DB;
use Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use View;
use Session;
use Illuminate\Support\Facades\Redirect;
use Nerd;
use Illuminate\Support\Facades\Validator;
use Input;

class MovieslistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $products = Home::orderBy('id', 'DESC')                         
                            /*->where('title', 'required|max:20')*/
                            ->paginate(15);

        // load the view and pass the nerds
        return View::make('admin.pages.movies_list')
            ->with('products', $products);
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
        $dataI = DB::table('tbl_product');
        $this->validate($request, [
            'title' => 'required|min:2',
            'description' => 'required',
            'url' => 'required|min:5', /*'required|url|max:120', for invalid url*/
            'years' => 'required|min:4|max:4',
            'img' => 'required',
            'categories' => 'required',           


            ]);
        

        
       $title = $request->input('title');
        $description = $request->input('description');
        $url = $request->input('url');
        $years = $request->input('years');
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
        $categories = $request->input('categories');        
        $active = $request->input('active');
        $create_date = $request->input('created_date');
        $update_at = $request->input('updated_at');

        $data= array('title' => $title, 'description'=> $description, 'url'=>$url, 'years' => $years, 'img' => 
            $filename, 'active' => $active, 'categories' => $categories, 'created_date' => $create_date, 'updated_at' => $update_at);

        $dataI->insert($data); 
      /*  $movie = new Home;
        $movie -> title = $request->title;
        $movie -> description = $request->description;
        $movie -> url = $request->url;
        $movie -> years = $request->years;
        $movie -> img = $request->img;
        $movie -> categories = $request->categories;
        $movie -> create_date = $request->create_date;
        $movie -> update_at = $request->update_at;
        $movie->save();*/

        return redirect('/movieslist')->with('message', 'Data inserted');
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
    public function search_result(Request $request){
        $Search = $request->search_result;
        $products = Home::orderBy('id', 'DESC')
                            ->where('title', 'like',"%$Search%")
                            ->paginate(15);
        return view('admin.pages.movies_list', compact('products'));                    
    }

    public function edit($id)
    {
        /*// get the nerd
        $pro = Home::find($id);

        // show the edit form and pass the nerd
        return View::make('create_movie')
            ->with('pro', $pro);*/
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
        
    }
    public function destroy($id)
    {
         // delete
        $products = Home::find($id);
        $products->delete();

        // redirect
        Session::flash('message', 'Successfully deleted!');
        return Redirect::back();
    }
    }
