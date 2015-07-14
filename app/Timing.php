<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timing extends Model
{
    public function artist() {
        return $this->belongsTo('App\Artist');
    }

    public function venue() {
        return $this->belongsTo('App\Venue');
    }
}