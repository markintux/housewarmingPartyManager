<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        if(Auth::check()){
            // $id = Auth::getUser()->id;
            // $name = Auth::getUser()->name;
            // $email = Auth::getUser()->email;
            return view('app.home');
        }else{
            return view('site.index');
        }
    }
}
