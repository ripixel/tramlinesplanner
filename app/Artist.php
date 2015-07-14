<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    public function timing() {
        return $this->belongsTo('App\Timing');
    }
}
