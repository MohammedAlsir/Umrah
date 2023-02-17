<?php

namespace Database\Seeders;

use App\Models\Type_process;
use Illuminate\Database\Seeder;

class TypeProcess extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $type  = new Type_process();
        $type->name = 'طلب عمرة';
        $type->price = 0;
        $type->price_sr = 0;
        $type->save();
    }
}