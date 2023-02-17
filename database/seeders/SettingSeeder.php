<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $setting  = new Setting();
        $setting->dollar_price = 568;
        $setting->sr_price = 149;
        $setting->save();
    }
}