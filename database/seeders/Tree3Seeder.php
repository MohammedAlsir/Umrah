<?php

namespace Database\Seeders;

use App\Models\Tree3;
use Illuminate\Database\Seeder;

class Tree3Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tree3  = new Tree3();
        $tree3->tree3_code = 1201;
        $tree3->tree3_name = 'الوكلاء';
        $tree3->tree2_code = 12;
        $tree3->save();

        $tree3  = new Tree3();
        $tree3->tree3_code = 1202;
        $tree3->tree3_name = 'نقدية بالخزينة';
        $tree3->tree2_code = 12;
        $tree3->save();

        $tree3  = new Tree3();
        $tree3->tree3_code = 1203;
        $tree3->tree3_name = 'نقدية بالبنوك';
        $tree3->tree2_code = 12;
        $tree3->save();

        // //////////////////////////////////

        $tree3  = new Tree3();
        $tree3->tree3_code = 1204;
        $tree3->tree3_name = 'سلفيات الموظفين';
        $tree3->tree2_code = 12;
        $tree3->save();


        $tree3  = new Tree3();
        $tree3->tree3_code = 2101;
        $tree3->tree3_name = 'الموظفين';
        $tree3->tree2_code = 21;
        $tree3->save();

        $tree3  = new Tree3();
        $tree3->tree3_code = 2201;
        $tree3->tree3_name = 'دائنون حكوميون';
        $tree3->tree2_code = 22;
        $tree3->save();



        $tree3  = new Tree3();
        $tree3->tree3_code = 4101;
        $tree3->tree3_name = 'ايرادات اخري';
        $tree3->tree2_code = 41;
        $tree3->save();



        $tree3  = new Tree3();
        $tree3->tree3_code = 5101;
        $tree3->tree3_name = 'منصرفات اخري';
        $tree3->tree2_code = 51;
        $tree3->save();
    }
}