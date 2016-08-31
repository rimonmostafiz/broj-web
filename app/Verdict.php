<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Verdict extends Model
{
    //
    protected $primaryKey = 'verdict_id';

    public function submission() {

        return $this->belongsTo(Submission::class);
    }

    /*public static function find($submission_id) {

    }*/
}
