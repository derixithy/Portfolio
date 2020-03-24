<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{

    public function tags()
    {
        return $this->morphTo();
    }
}

