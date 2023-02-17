<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requirement_processe extends Model
{
    use HasFactory;

    public function requirements()
    {
        return $this->belongsTo(Requirement::class, 'requirement_id');
    }
}