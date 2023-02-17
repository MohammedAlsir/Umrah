<?php

namespace App\Http\Controllers;

use App\Models\Requirement;
use App\Models\Requirement_processe;
use App\Models\Type_process;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class TypeProcessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Type_process::all();
        return view('type_process.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $requirements = Requirement::all();

        return view('type_process.create', compact('requirements'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            'name'        => 'required',
            'price'        => 'required',
            'price_sr'        => 'required',
            'requirements'        => 'required',
            // 'status_insurance'        => '',
        ));
        //Insert
        $type = new Type_process();
        $type->name = $request->name;
        $type->price = $request->price;
        $type->price_sr = $request->price_sr;

        // $type->status_insurance = $request->status_insurance;
        $type->save();

        foreach ($request->requirements as $one) {
            $requirement_process = new Requirement_processe();
            $requirement_process->requirement_id = $one;
            $requirement_process->type_processes_id = $type->id;
            $requirement_process->save();
        }

        // redirect
        // Session::flash('SUCCESS', 'تم إضافة نوع معاملة جديد بنجاح');

        // Alert::success('نجاح', 'تم إضافة نوع معاملة جديد بنجاح');
        toast('تم إضافة نوع معاملة جديد بنجاح', 'success');
        // Alert("تم إضافة نوع معاملة جديد بنجاح", "", "success");


        return redirect()->route('type_process.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $requirements = Requirement::all();

        $requirement_type_process = Requirement_processe::where('type_processes_id', $id)->get();
        $type = Type_process::find($id);
        return view('type_process.edit', compact('type', 'requirements', 'requirement_type_process'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, array(
            'name'        => 'required',
            'price'        => 'required',
            // 'status_insurance'        => '',
        ));
        //Insert
        $type = Type_process::find($id);
        $type->name = $request->name;
        $type->price = $request->price;
        $type->price_sr = $request->price_sr;

        // $type->status_insurance = $request->status_insurance;
        $type->save();

        // كل العناصر المضافة في قاعدة البيانات
        $requirement_process_chose_first = Requirement_processe::where('type_processes_id', $id)->get();


        $first_chose = [];

        // تحزين العناصر المضافة في قاعدة البيانات في متغيير جديد
        if ($requirement_process_chose_first->count() > 0) {
            foreach ($requirement_process_chose_first as $single) {
                $first_chose[] = $single->requirement_id;
            }
        }



        // اضافة العناصر
        foreach ($request->requirements as $one) {
            if (in_array($one, $first_chose)) {
            } else {
                $requirement_process = new Requirement_processe();
                $requirement_process->requirement_id = $one;
                $requirement_process->type_processes_id = $type->id;
                $requirement_process->save();
            }
        }

        // حذف العناصر غير الموجودة
        foreach ($requirement_process_chose_first as $one_one) {
            if (in_array($one_one->requirement_id, $request->requirements)) {
            } else {
                $one_one->delete();
            }
        }

        // Session::flash('SUCCESS', 'تم تعديل بيانات نوع المعاملة بنجاح');
        toast('تم تعديل بيانات نوع المعاملة بنجاح', 'success');


        // redirect
        return redirect()->route('type_process.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $type = Type_process::find($id);
        $type->delete();
        // Session::flash('SUCCESS', 'تم  حذف نوع المعاملة بنجاح');
        toast('تم  حذف نوع المعاملة بنجاح', 'success');


        return redirect()->route('type_process.index');
    }
}