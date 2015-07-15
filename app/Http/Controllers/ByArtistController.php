<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Artist;
use App\Timing;
use App\User;

class ByArtistController extends Controller
{
    function show() {

        $timings = Timing::orderBy('artist_name','asc')->get();
        $select_timings = Timing::lists('artist_name','artist_name');

        //TODO make this run from logged in user
        $user = User::first();
        // if logged in then set this to an actual array
        $already_selected_timings = $user->timings->lists('artist_name','artist_name')->toArray();
        // if not then set it to an empty array

        return view('byartist', compact('timings', 'select_timings', 'already_selected_timings'));
    }
}
