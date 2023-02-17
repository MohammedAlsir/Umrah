<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Laravel\Passport\HasApiTokens;


class Agent extends Authenticatable
{
    use HasApiTokens, HasFactory;
    // protected $fillable = ['name'];

    protected $hidden = [
        'password',
    ];

    public function process()
    {
        return $this->hasOne('App\Models\Process', 'agent_id');
    }

    public function username()
    {
        return 'email';
    }
}