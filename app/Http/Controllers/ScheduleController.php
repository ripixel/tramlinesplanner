<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Timing;
use DB;
use Auth;
use Carbon\Carbon;

class ScheduleController extends Controller
{

    /**
     * Constructor with middleware
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['compare', 'compareShow', 'sharedShow']]);
    }

    public function store(Request $request) {
        $this->UpdateSchedule($request);

        return redirect(action('ScheduleController@show'));
    }

    public function show() {
        $user = Auth::user();

        // check if the user has a share_str, and if not generate them one
        if($user->share_str=='') {
            $running = true;
            $newRandom = '';
            while($running) {
                $newRandom = str_random(5);
                $checkUser = User::where(DB::raw('BINARY `share_str`'),'=',$newRandom)->first();
                if($checkUser===null) {
                    $running = false;
                }
            }

            $user->share_str = $newRandom;
            $user->save();
        }

        $timings = $user->timings()->orderBy('id', 'asc')->get();
        $title = "Your Schedule";

        $clashes = $this->checkForClashes($timings);

        return view('myschedule', compact('timings','user','title','clashes'));
    }

    public function compare() {
        $title = "Compare Schedules";
        return view('compare',compact('title'));
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
            $title = "Compare Schedules for " . $user_1->name . " and " . $user_2->name;

            return view('compareschedule', compact('user_1', 'user_2', 'timings','title'));

        } else {
            return redirect('/compare');
        }
    }

    public function sharedShow($share_str) {
        // Case sensitive
        $user = User::where(DB::raw('BINARY `share_str`'),'=',$share_str)->first();
        if($user !== null) {
            $timings = $user->timings()->orderBy('id', 'asc')->get();
            $title = $user->name . "'s Schedule'";
            return view('shareschedule', compact('timings', 'user','title'));
        } else {
            return redirect('/');
        }
    }

    private function UpdateSchedule(Request $request) {
        $user = Auth::user();
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

    private function checkForClashes($timings) {
        $date = Carbon::parse('2015-07-24');
        $timeBlocks = [];

        while($date->day != 28) {
            $timeBlocks = array_add($timeBlocks, $date->format('Y-m-d H:i'), '');
            $date = $date->addMinutes(5);
        }

        $clashes = [];
        foreach($timings as $timing) {
            $key = $timing->date->format('Y-m-d') . ' ' . $timing->start_time;
            $key = Carbon::parse($key);
            for($i=1; $i<$timing->numberOfColumnsForScheduleView(); $i++) {
                $currentBlockValue = $timeBlocks[$key->format('Y-m-d H:i')];
                if($currentBlockValue=='') {
                    $timeBlocks[$key->format('Y-m-d H:i')] = $timing->artist_name;
                } else {
                    $textToAdd = '<span style="color: #fff;">'.$key->format('l').':</span> <strong>'.$currentBlockValue . '</strong> clashes with <strong>' . $timing->artist_name .'</strong>';
                    if(! in_array($textToAdd, $clashes)) {
                        array_push($clashes, $textToAdd);
                    }
                }
                $key = $key->addMinutes(5);
            }
        }

        return $clashes;
    }
}
