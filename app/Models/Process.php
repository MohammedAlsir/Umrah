<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Process extends Model
{
    use HasFactory;

    // protected $hidden = [
    //     'dollar_price',
    //     'price_type'

    // ];

    public function agent()
    {
        return $this->belongsTo('App\Models\Agent', 'agent_id');
    }

    public function type()
    {
        return $this->belongsTo('App\Models\Type_process', 'type_processe_id');
    }

    public function daily()
    {
        return $this->hasMany('App\Models\Daily_restriction', 'processe_id', 'id');
    }

    public function ticket()
    {
        return $this->hasOne('App\Models\Ticket', 'processe_id');
    }
}