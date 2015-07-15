<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timing extends Model
{
    protected $dates = ['date'];

    public function artist() {
        return Artist::where('name','=', $this->artist_name);
    }

    public function venue() {
        return Venue::where('name','=', $this->venue_name);
    }

    private function columnCounter($start_hour_part, $start_minute_part, $end_hour_part, $end_minute_part) {
        if($start_hour_part > $end_hour_part) {
            // the end hour part is midnight or later
            $end_hour_part = $end_hour_part + 24;
        }

        // Does the timing go over the hour?
        $hours_diff = $end_hour_part - $start_hour_part;
        if($hours_diff > 0) {
            // yes
            $runningTotal = $hours_diff * 60;
            $runningTotal = $runningTotal - $start_minute_part;
            $runningTotal = $runningTotal + $end_minute_part;
            return $runningTotal / 5;
        } else {
            $runningTotal = $end_minute_part - $start_minute_part;
            return $runningTotal / 5;
        }
    }

    public function numberOfColumnsForScheduleView() {
        $start_hour_part = intval(substr($this->start_time, 0, 2));
        $start_minute_part = intval(substr($this->start_time, 3, 2));
        $end_hour_part = intval(substr($this->end_time, 0, 2));
        $end_minute_part = intval(substr($this->end_time, 3, 2));

        return $this->columnCounter($start_hour_part, $start_minute_part, $end_hour_part, $end_minute_part);
    }

    public function numberOfPaddingColumns($last_hour_part, $last_minute_part) {
        $end_hour_part = intval(substr($this->start_time, 0, 2));
        $end_minute_part = intval(substr($this->start_time, 3, 2));

        return $this->columnCounter($last_hour_part, $last_minute_part, $end_hour_part, $end_minute_part);
    }

    public function users() {
        return $this->belongsToMany('App\User');
    }
}