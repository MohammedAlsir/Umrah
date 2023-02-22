<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regiment extends Model
{
    use HasFactory;

    #beneficiary
    public function beneficiary()
    {
        return $this->hasMany(Beneficiary::class);
    } // end of beneficiary

    #Company
    public function company()
    {
        return $this->belongsTo(Company::class, 'airline_name');
    } // end of Company

    #daily
    public function daily()
    {
        return $this->hasOne(Daily_restriction::class, 'regiment_id');
    } // end of daily

    #expenses
    public function expenses()
    {
        return $this->hasMany(ExpensesRegiment::class);
    } // end of expenses

}
