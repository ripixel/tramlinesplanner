<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    function show()
    {
        $title = "Home";
        return view('home',compact('title'));
    }
}
