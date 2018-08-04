<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function getView(){
        return view('dashboard_admin');
    }
}
