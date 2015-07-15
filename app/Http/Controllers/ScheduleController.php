<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Timing;
use DB;

class ScheduleController extends Controller
{
    public function store(Request $request) {
        $this->UpdateSchedule($request);

        return redirect(action('ScheduleController@show'));
    }

    public function show() {
        //TODO use logged in user
        $user = User::first();
        $timings = $user->timings()->orderBy('id', 'asc')->get();
        return view('myschedule', compact('timings','user'));
    }

    public function compare() {
        return view('compare');
    }

    public function compareShow($share_str_1, $share_str_2) {

        $user_1 = User::where(DB::raw('BINARY `share_str`'),'=',$share_str_1)->first();
        $user_2 = User::where(DB::raw('BINARY `share_str`'),'=',$share_str_2)->first();

        if($user_1 !== null && $user_2 !== null) {

            $user_1_timings = $user_1->timings->lists('artist_name')->toArray();
            $user_2_timings = $user_2->timings->lists('artist_name')->toArray();

            $all_timings = Timing::lists('artist_name')->toArray();
            $shared_timings = array_intersect($all_timings, $user_1_timings, $user_2_timings);

            $timings = $timings = Timing::whereIn('artist_name', $shared_timings)->get();

            return view('compareschedule', compact('user_1', 'user_2', 'timings'));

        } else {
            return redirect('/compare');
        }
    }

    public function sharedShow($share_str) {
        // Case sensitive
        $user = User::where(DB::raw('BINARY `share_str`'),'=',$share_str)->first();
        if($user !== null) {
            $timings = $user->timings()->orderBy('id', 'asc')->get();
            return view('shareschedule', compact('timings', 'user'));
        } else {
            return redirect('/');
        }
    }

    private function UpdateSchedule(Request $request) {
        //TODO use logged in user
        $user = User::first();
        if($request->input('selected_timings') !== null) {
            $this->syncTimings($user, $request->input('selected_timings'));
        } else {
            $this->syncTimings($user, []);
        }
    }

    private function syncTimings(User $user, array $selected_timings)
    {
        $timings = Timing::whereIn('artist_name', $selected_timings)->get();

        $user->timings()->sync($timings);
    }
}
