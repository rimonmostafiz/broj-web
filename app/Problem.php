<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Problem extends Model
{
    protected $primaryKey = 'problem_id';
    protected $fillable = array(
        'problem_name',
        'problem_author',
        'statement',
        'sample_input',
        'sample_output',
        'time_limit',
        'memory_limit',
        'score',
        'judge_input',
        'judge_output',
        );

    public function contest() {

        return $this->belongsTo(Contest::class);
    }

    public function submissions() {
        return $this->hasMany(Submission::class);
    }
}
