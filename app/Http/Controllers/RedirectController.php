<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;

class RedirectController extends Controller
{
    public function index(){
        return view('errors.503');
    }
}
