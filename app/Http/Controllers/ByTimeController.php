<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Venue;
use App\Timing;
use App\User;
use Auth;

class ByTimeController extends Controller
{

    /**
     * Constructor with middleware
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    function show() {

        $venues = Venue::all();
        $select_timings = Timing::lists('artist_name','artist_name');
        $title = "Plan by Time";

        $user = Auth::user();
        $already_selected_timings = [];
        // if logged in then set this to an actual array
        if($user!==null) {
            $already_selected_timings = $user->timings->lists('artist_name','artist_name')->toArray();
        }

        return view('bytime', compact('venues', 'select_timings', 'already_selected_timings','title'));
    }
}
