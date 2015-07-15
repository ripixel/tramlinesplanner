<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Artist;
use App\Timing;
use App\User;
use Auth;

class ByArtistController extends Controller
{

    /**
     * Constructor with middleware
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    function show() {

        $timings = Timing::orderBy('artist_name','asc')->get();
        $select_timings = Timing::lists('artist_name','artist_name');
        $title = "Plan by Artist";

        $user = Auth::user();
        $already_selected_timings = [];
        // if logged in then set this to an actual array
        if($user!==null) {
            $already_selected_timings = $user->timings->lists('artist_name','artist_name')->toArray();
        }

        return view('byartist', compact('timings', 'select_timings', 'already_selected_timings','title'));
    }
}
