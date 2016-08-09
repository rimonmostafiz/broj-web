<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contest extends Model
{
    public function problems()
    {
        return $this->hasMany(Problem::class);
    }

    public function path() {
        return '/contests/'.$this->title;
    }
}
