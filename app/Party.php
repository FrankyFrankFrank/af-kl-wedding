<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Party extends Model
{
    public function guests() {
    	return $this->hasMany(User::class);
    }
}
