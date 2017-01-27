<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;

class LoginController extends Controller
{
    public function login(){
    	return view('test.login');
    }
    public function postLogin(Request $request){
        if(Sentinel::authenticate($request->all())){
            $slug = Sentinel::getUser()->roles()->first()->slug;
        if($slug=='admin')
        return redirect('/cms');
        elseif($slug == 'manager')
            /*return view('manager.manager');*/
        return view('test.login');

        }else{
            return redirect()->back()->with('error', 'Wrong Username or Password');

        }
    	
    	
    }

    public function postLogout(){
    	Sentinel::logout();
    	return redirect('/login');
    }
}
