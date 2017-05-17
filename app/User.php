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

    public function invited_to() {
        return $this->belongsTo('App\Wedding');
    }

    public function accept_invitation(int $code) {
        if($code != $this->rsvp_number) {
            return;
        }
        $this->update([
            'status' => 'accepted'
        ]);
    }

    public function decline_invitation(int $code) {
        if($code != $this->rsvp_number) {
            return;
        }
        $this->update([
            'status' => 'declined'
        ]);
    }
}
