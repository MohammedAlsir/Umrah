<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    #tickets
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    } // end of tickets

}
