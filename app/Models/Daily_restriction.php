<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Daily_restriction extends Model
{
    use HasFactory;
    public function debtors()
    {
        return $this->belongsTo(Tree4::class, 'debtor', 'tree4_code');
    }

    public function Creditors()
    {
        return $this->belongsTo(Tree4::class, 'Creditor', 'tree4_code');
    }

    // public function debtor()
    // {
    //     return $this->belongsTo('App\Models\Tree4', 'tree4_code', 'debtor');
    // }

    // public function Creditor()
    // {
    //     return $this->belongsTo('App\Models\Tree4', 'tree4_code', 'Creditor');
    // }
}