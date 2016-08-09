<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Problem extends Model
{
    protected $fillable = ['body', 'title'];

    public function contest() {

        return $this->belongsTo(Contest::class);
    }
}
