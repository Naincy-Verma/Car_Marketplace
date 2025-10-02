<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index(){
        // return view('adminpages.dashboard');
         $title = "Dashboard";
    $subTitle = "Home";
    return view('adminpages.dashboard', compact('title', 'subTitle'));
    }
}
