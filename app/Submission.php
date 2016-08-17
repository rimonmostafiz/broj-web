<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    //
    public function contest() {

        return $this->belongsTo(Contest::class);
    }

    public function problem() {
        return $this->belongsTo(Problem::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
