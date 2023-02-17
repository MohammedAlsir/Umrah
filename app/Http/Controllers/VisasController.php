<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Visa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class VisasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $visas = Visa::all();
        $id = 1;
        return view('visas.index', compact('visas', 'id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $agents = Agent::all();
        return view('visas.create', compact('agents'));
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
            'visa_number'        => 'required',
            'guarantor_number'        => 'required',
            'guarantor_name'        => 'required',
            'guarantor_address'        => 'required',
            'notes'        => '',
            'work'        => 'required',
            'passport_name'        => 'required',
            'agent_id'        => '',
            'agent_second_name'        => '',
            'agent_second_phone'        => '',

        ));
        //Insert
        $visa = new Visa();
        $visa->visa_number = $request->visa_number;
        $visa->guarantor_number = $request->guarantor_number;
        $visa->guarantor_name = $request->guarantor_name;
        $visa->guarantor_address = $request->guarantor_address;
        $visa->notes = $request->notes;
        $visa->work = $request->work;
        $visa->record_number = $request->record_number;
        $visa->passport_name = $request->passport_name;
        $visa->agent_second_name = $request->agent_second_name;
        $visa->agent_second_phone = $request->agent_second_phone;

        if ($request->agent_second_name == '' && $request->agent_second_phone == '') {
            $visa->agent_id = $request->agent_id;
        }

        do {
            $code = random_int(10000000000, 99999999999);
        } while (Visa::where("code", "=", $code)->first());
        $visa->code = $code;
        $visa->save();

        toast('تم  إضافة تأشيرة جديدة بنجاح', 'success');

        // Session::flash('SUCCESS', 'تم  إضافة تأشيرة جديدة بنجاح');

        // redirect
        return redirect()->route('visas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $visa = Visa::find($id);
        return view('visas.edit', compact('visa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $visa = Visa::find($id);
        $agents = Agent::all();
        return view('visas.edit', compact('agents', 'visa'));
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
            'visa_number'        => 'required',
            'guarantor_number'        => 'required',
            'guarantor_name'        => 'required',
            'guarantor_address'        => 'required',
            'notes'        => '',
            'work'        => 'required',
            'passport_name'        => 'required',
            'agent_id'        => '',
            'agent_second_name'        => '',
            'agent_second_phone'        => '',

        ));
        //Insert
        $visa = Visa::find($id);
        $visa->visa_number = $request->visa_number;
        $visa->guarantor_number = $request->guarantor_number;
        $visa->guarantor_name = $request->guarantor_name;
        $visa->guarantor_address = $request->guarantor_address;
        $visa->notes = $request->notes;
        $visa->work = $request->work;
        $visa->record_number = $request->record_number;
        $visa->passport_name = $request->passport_name;
        if ($request->agent_second_name == '' && $request->agent_second_phone == '') {
            $visa->agent_id = $request->agent_id;
        }
        $visa->agent_second_name = $request->agent_second_name;
        $visa->agent_second_phone = $request->agent_second_phone;

        $visa->save();

        // redirect
        toast('تم  تعديل بيانات التأشيرة  بنجاح', 'success');

        // Session::flash('SUCCESS', 'تم  تعديل بيانات التأشيرة  بنجاح');

        return redirect()->route('visas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $visa = Visa::find($id);
        $visa->delete();
        toast('تم حذف بيانات التأشيرة  بنجاح', 'success');

        // Session::flash('SUCCESS', 'تم حذف بيانات التأشيرة  بنجاح');

        return redirect()->route('visas.index');
    }
}