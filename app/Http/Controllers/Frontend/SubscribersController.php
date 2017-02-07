<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\http\Requests\SubscriberRequest;
use Illuminate\Support\Facades\Redirect;
use App\Home;
use App\Subscriber;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class SubscribersController extends Controller
{
    public function index(){
    	$home =Subscriber::all();
    }
    public function send(SubscriberRequest $request){
    	$movie = new Subscriber;

        $email = $request->input('email');
        $created_at = Carbon::now();
        $updated_at = Carbon::now();

        $data= array('email'=> $email,'created_at' => $created_at, 'updated_at' => $updated_at);
        $movie->insert($data);
        /*$movie->MovieGenre()->attach($moviegenre);*/
        
        return Redirect::back()->with('message', '<div class="alert alert-success">
                                              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                              <strong class="text-center">Thanks for Your Subcription</strong>.
                                            </div>');
    }
}
