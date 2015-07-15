<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Timing;

class ScheduleController extends Controller
{
    public function store(Request $request) {
        $this->UpdateSchedule($request);
    }

    public function show() {
        return view('schedule');
    }

    private function UpdateSchedule(Request $request) {
        //TODO use logged in user
        $user = User::first();
        if($request->input('selected_timings') !== null) {
            $this->syncTimings($user, $request->input('selected_timings'));
        } else {
            $this->syncTimings($user, []);
        }

        return redirect(action('ScheduleController@show'));
    }

    private function syncTimings(User $user, array $selected_timings)
    {
        $timings = Timing::whereIn('artist_name', $selected_timings)->get();

        $user->timings()->sync($timings);
    }
}
