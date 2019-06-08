<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function getView(){
        return view('admin.dashboard');
    }
    public function getViewDashboard(Request $request){
        // var_dump($request->session()->get('user')); exit();

        return view('admin.dashboard');
        
    }
}
