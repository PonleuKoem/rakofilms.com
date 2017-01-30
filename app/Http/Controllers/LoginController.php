<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;

class LoginController extends Controller
{
    public function login(){
    	return view('admin.login');
    }
    public function postLogin(Request $request){
        if(Sentinel::authenticate($request->all())){
            $slug = Sentinel::getUser()->roles()->first()->slug;
        if($slug=='admin')
        return redirect('/cms');
        elseif($slug == 'manager')
            /*return view('manager.manager');*/
        return view('admin.login');

        }else{
            return redirect()->back()->with('error', '<div class="alert alert-warning">
                                              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                              <strong class="text-center">Wrong Email or Password</strong>.
                                            </div>');

        }
    	
    	
    }

    public function postLogout(){
    	Sentinel::logout();
    	return redirect('/login');
    }
}
