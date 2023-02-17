<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type_process extends Model
{
    use HasFactory;

    public function process()
    {
        return $this->belongsTo('App\Models\Process', 'type_processe_id');
    }

    public function requirements()
    {
        return $this->belongsToMany(Requirement::class, Requirement_processe::class, 'type_processes_id', 'requirement_id');
    }
}