<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    public function timings() {
        return $this->belongsToMany('App\Timing');
    }
}
