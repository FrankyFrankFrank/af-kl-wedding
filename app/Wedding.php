<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wedding extends Model
{
    public function invited()
    {
    	return $this->hasMany('App\User');
    }

    public function unresponded()
    {
    	return $this->hasMany('App\User')->where('status', 'unresponded');
    }

    public function attending()
    {
    	return $this->hasMany('App\User')->where('status', 'accepted');
    }

    public function declined()
    {
    	return $this->hasMany('App\User')->where('status', 'declined');
    }

    public function invite($user)
    {
    	$this->invited()->save($user);
    }

}
