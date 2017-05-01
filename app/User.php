<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function __construct($status = 'unresponded'){
        parent::__construct();
        $this->status = $status;
    }

    public function invited_to() {
        return $this->belongsTo('App\Wedding');
    }

    public function setStatus($status)
    {
        $this->status = $status;
        $this->save();
    }

    public function accept_invitation() {
        $this->status = 'attending';
        $this->save();
    }

    public function decline_invitation() {
        $this->status = 'declined';
        $this->save();
    }
}
