<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Daily_restriction;
use App\Models\Process;
use App\Models\Requirement_has_processe;
use App\Models\Setting;
use App\Models\Status_process_visa;
use App\Models\Tree4;
use App\Models\Type_process;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProcesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dollar_price = Setting::find(1);
        $process = Process::all();
        // $status_process = Status_process_visa::where('belongs_to', 1)->get();
        $id = 1;
        return view('process.index', compact('process', 'dollar_price', 'id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $agents = Agent::all();
        $type = Type_process::all();
        $setting = Setting::find(1);
        $tree4 = Tree4::whereBetween('tree4_code', ['120200001', '120399999'])->get();
        return view('process.create', compact('agents', 'type', 'setting', 'tree4'));
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
            'beneficiary'        => 'required',
            'beneficiary_phone'        => 'required',
            'type_processe_id'        => 'required',
            'agent_id'        => 'required',
            // 'agreement_amount'        => 'required',
            // 'other_costs'        => 'required',
            // 'insurance_amount'        => '',
            'notes'        => '',
            'dollar_price' => 'required',
            'sr_price' => 'required',
            'price_type' => 'required',
            'price_type_sr' => 'required',
            'visa_number' => 'required'

        ));
        //Insert
        $process = new Process();
        $process->beneficiary = $request->beneficiary;
        $process->beneficiary_phone = $request->beneficiary_phone;
        $process->type_processe_id = $request->type_processe_id;
        $process->agent_id = $request->agent_id;
        $process->visa_number = $request->visa_number;

        // $process->agreement_amount = $request->agreement_amount;
        // $process->other_costs = $request->other_costs;
        // $process->insurance_amount = $request->insurance_amount;
        $process->notes = $request->notes;
        $process->dollar_price = $request->dollar_price;
        $process->sr_price = $request->sr_price;

        $process->price_type = $request->price_type;
        $process->price_type_sr = $request->price_type_sr;


        $process->total_boundsd = $request->total_boundsd_type;
        $process->status = 0;

        // last edit
        // $process->passport_number = $request->passport_number;
        // $process->serial_number = $request->serial_number;
        // $process->date_entry = $request->date_entry;
        // $process->expected_date = $request->expected_date;





        // Begin

        $daily =  new Daily_restriction;
        $check =  Daily_restriction::orderBy('id', 'DESC')->first();


        $daily->price = $request->total_boundsd_type;
        $daily->date = Carbon::now()->Format('Y-m-d');
        $daily->Statement = $request->Statement;
        $daily->type = 1;

        if ($request->tree4_code) {
            $daily->debtor = $request->tree4_code;
        } else {
            $daily->debtor = $process->agent->tree4_code;
        }

        if ($check) {
            $daily->registration_number = $check->registration_number + 1;
        } else {
            $daily->registration_number =  1;
        }
        // // Code
        // do {
        //     $code = random_int(10000000000, 99999999999);
        // } while (Process::where("code", "=", $code)->first());
        // $process->code = $code;

        $process->save();
        $daily->processe_id = $process->id;
        $daily->save();
        // finish

        if ($request->requirements) {
            foreach ($request->requirements as $one) {
                $requirements = new Requirement_has_processe();
                $requirements->requirement_processes_id = $one;
                $requirements->processes_id = $process->id;
                $requirements->save();
            }
        }

        if ($request->tree4_code) {
            $daily =  new Daily_restriction;
            // $check =  Daily_restriction::latest()->first();

            $daily->processe_id = $process->id;

            $daily->price = $request->total_boundsd_type;
            $daily->date = Carbon::now()->Format('Y-m-d');
            $daily->Statement = $request->Statement;
            $daily->type = 1;

            $daily->debtor = $process->agent->tree4_code;

            if ($check) {
                $daily->registration_number = $check->registration_number + 1;
            } else {
                $daily->registration_number =  1;
            }
            $daily->save();

            $daily =  new Daily_restriction;
            // $check =  Daily_restriction::latest()->first();

            $daily->processe_id = $process->id;

            $daily->price = $request->total_boundsd_type;
            $daily->date = Carbon::now()->Format('Y-m-d');
            $daily->Statement = $request->Statement;
            $daily->type = 1;

            $daily->Creditor = $process->agent->tree4_code;
            // $daily->debtor = $request->tree4_code;

            if ($check) {
                $daily->registration_number = $check->registration_number + 1;
            } else {
                $daily->registration_number =  1;
            }
            $daily->save();
        }



        // redirect
        // Session::flash('SUCCESS', 'تم  إضافة المعاملة بنجاح');
        toast('تم  إضافة المعاملة بنجاح', 'success');


        return redirect()->route('process.show', $process->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $process = Process::find($id);
        return view('process.show', compact('process'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $agents = Agent::all();
        $type = Type_process::all();
        $process = Process::find($id);

        return view('process.edit', compact('process', 'agents', 'type'));
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
            'beneficiary'        => 'required',
            'beneficiary_phone'        => 'required',
            'type_processe_id'        => 'required',
            'agent_id'        => 'required',
            // 'agreement_amount'        => 'required',
            // 'other_costs'        => 'required',
            // 'insurance_amount'        => '',
            'notes'        => '',
            'dollar_price' => 'required',
            'sr_price' => 'required',
            'price_type' => 'required',
            'price_type_sr' => 'required',
            'visa_number' => 'required'





        ));
        //Insert
        $process =  Process::find($id);
        $process->beneficiary = $request->beneficiary;
        $process->beneficiary_phone = $request->beneficiary_phone;
        $process->type_processe_id = $request->type_processe_id;
        $process->agent_id = $request->agent_id;
        $process->visa_number = $request->visa_number;
        // $process->other_costs = $request->other_costs;
        // $process->insurance_amount = $request->insurance_amount;
        $process->notes = $request->notes;

        $process->price_type = $request->price_type;
        $process->price_type_sr = $request->price_type_sr;


        $process->total_boundsd = $request->total_boundsd_type;

        // last edit
        // $process->passport_number = $request->passport_number;
        // $process->serial_number = $request->serial_number;
        // $process->date_entry = $request->date_entry;
        // $process->expected_date = $request->expected_date;

        $process->save();

        // كل العناصر المضافة في قاعدة البيانات
        $requirements_chosen_first = Requirement_has_processe::where('processes_id', $id)->get();


        // تحزين العناصر المضافة في قاعدة البيانات في متغيير جديد
        if ($requirements_chosen_first) {
            foreach ($requirements_chosen_first as $single) {
                $first_chose[] = $single->requirement_processes_id;
            }
        }


        // اضافة العناصر
        if ($request->requirements) {
            foreach ($request->requirements as $one) {
                if ($requirements_chosen_first->count() == 0) {
                    $requirements = new Requirement_has_processe();
                    $requirements->requirement_processes_id = $one;
                    $requirements->processes_id = $process->id;
                    $requirements->save();
                } elseif (in_array($one, $first_chose)) {
                } else {
                    $requirements = new Requirement_has_processe();
                    $requirements->requirement_processes_id = $one;
                    $requirements->processes_id = $process->id;
                    $requirements->save();
                }
            }
        }

        if ($requirements_chosen_first) {

            // حذف العناصر غير الموجودة
            foreach ($requirements_chosen_first as $one_one) {
                if ($request->requirements) {
                    if (in_array($one_one->requirement_processes_id, $request->requirements)) {
                    } else {
                        $one_one->delete();
                    }
                } else {
                    $one_one->delete();
                }
            }
        }

        // Begin

        $daily =  Daily_restriction::where('processe_id', $process->id)->get();
        // $check =  Daily_restriction::latest()->first();


        foreach ($daily as $item) {
            $item->price = $request->total_boundsd_type;
            $item->Statement = $request->Statement;

            $item->save();
        }
        $process->save();
        // finish
        // redirect
        // Session::flash('SUCCESS', 'تم  تعديل بيانات المعاملة بنجاح');
        toast('تم  تعديل بيانات المعاملة بنجاح', 'success');


        return redirect()->route('process.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $process = Process::find($id);
        $process->delete();
        toast('تم  حذف المعاملة بنجاح', 'success');

        // Session::flash('SUCCESS', 'تم  حذف المعاملة بنجاح');

        return redirect()->route('process.index');
    }
}