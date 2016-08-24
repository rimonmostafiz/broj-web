<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contest extends Model
{
    protected $primaryKey = 'contest_id';

    public function problems()
    {
        return $this->hasMany(Problem::class);
    }

    public function submissions() {
        return $this->hasMany(Submission::class);
    }

    public function path() {
        return '/contests/'.$this->title;
    }
}
