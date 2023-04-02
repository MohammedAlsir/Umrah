<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    public function process()
    {
        return $this->belongsTo('App\Models\Process', 'processe_id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}