<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Artist;

class ByArtistController extends Controller
{
    function show() {

        $artists = Artist::all();

        return view('byartist', compact('artists'));
    }
}
