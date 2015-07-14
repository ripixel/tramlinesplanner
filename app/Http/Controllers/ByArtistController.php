<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Artist;

class ByArtistController extends Controller
{
    function show() {

        $artists = Artist::orderBy('name','asc')->get();
        $select_artists = Artist::lists('name','name');

        return view('byartist', compact('artists', 'select_artists'));
    }
}
