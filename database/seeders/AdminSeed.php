<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user  = new User();
        $user->name = 'admin';
        $user->email = 'admin';
        $user->password = Hash::make('123456789');

        $user->agent_status = 'on';
        $user->company_status = 'on';
        $user->requirement_status = 'on';

        $user->process_status = 'on';
        $user->ticket_status = 'on';

        $user->final_delivery_status = 'on';
        $user->trees_status = 'on';
        $user->accounts_status = 'on';
        $user->check_account_status = 'on';

        $user->users_status = 'on';
        $user->report_status = 'on';
        $user->setting_status = 'on';

        $user->dollar_price_status = 'on';




        $user->save();
    }
}