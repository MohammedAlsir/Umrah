<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visa extends Model
{
    use HasFactory;

    public function agent()
    {
        return $this->belongsTo('App\Models\Agent', 'agent_id');
    }
}
