<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'countery',
        'phone',
        'note',
        'job_id'
    ];

    public function job()
    {
        return $this->belongsTo(Job::class, 'job_id');
    }
}