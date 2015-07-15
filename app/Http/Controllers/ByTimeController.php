<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Venue;
use App\Timing;
use App\User;

class ByTimeController extends Controller
{
    function show() {

        $venues = Venue::all();
        $select_timings = Timing::lists('artist_name','artist_name');

        //TODO make this run from logged in user
        $user = User::first();
        // if logged in then set this to an actual array
        $already_selected_timings = $user->timings->lists('artist_name','artist_name')->toArray();
        // if not then set it to an empty array

        return view('bytime', compact('venues', 'select_timings', 'already_selected_timings'));
    }
}
