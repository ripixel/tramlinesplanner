<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Timing;

class Venue extends Model
{
    public function timings() {
        return Timing::where('venue_name', '=', $this->name)->get();
    }
}
