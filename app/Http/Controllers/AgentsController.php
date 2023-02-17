<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Tree4;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;

class AgentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agents = Agent::orderBy('id', 'DESC')->get();
        $id = 1;
        return view('agents.index', compact('agents', 'id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('agents.create');
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
            'user_name'        => 'required|unique:agents',
            'password'        => 'required',
            'phone'        => 'required',

        ));
        //Insert
        $agent = new Agent();
        $agent->name = $request->name;
        $agent->user_name = $request->user_name;
        $agent->phone = $request->phone;

        $agent->password = Hash::make($request->password);


        // Add To tree4
        $tree4 = new Tree4();

        $tree4->tree4_name = $request->name;
        $tree4->tree3_code = 1201;


        $check = Tree4::where('tree3_code', 1201)->latest()->first();

        if ($check) {
            $tree4->tree4_code = $check->tree4_code + 1;
            $agent->tree4_code = $check->tree4_code + 1;
        } else {
            $tree4->tree4_code = ($tree4->tree3_code * 100000) + 1;
            $agent->tree4_code = ($tree4->tree3_code * 100000) + 1;
        }


        $tree4->save();

        $agent->save();


        // Session::flash('SUCCESS', 'تم إضافة وكيل  جديد بنجاح');
        toast('تم  إضافة الوكيل بنجاح', 'success');


        // redirect
        return redirect()->route('agents.index');
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
        $agent = Agent::find($id);
        return view('agents.edit', compact('agent'));
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
        $agent =  Agent::find($id);

        $this->validate($request, array(
            'name'        => 'required',
            // 'user_name'        => 'required|unique:agents',
            'user_name' => ['required', Rule::unique('agents')->ignore($agent)],

            'password'        => '',
            'phone'        => 'required',

        ));
        //Insert
        $agent->name = $request->name;
        $agent->user_name = $request->user_name;
        $agent->phone = $request->phone;

        if ($request->password) {
            $agent->password = Hash::make($request->password);
        }


        // $agent->save();

        // edit  tree4
        // edit  tree4
        $tree4 =  Tree4::where('tree4_code', $agent->tree4_code)->first();

        $tree4->tree4_name = $request->name;
        $tree4->save();

        $agent->save();

        // Session::flash('SUCCESS', 'تم تعديل بيانات الوكيل بنجاح');
        toast('تم تعديل بيانات الوكيل بنجاح', 'success');



        // redirect
        return redirect()->route('agents.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $agent = Agent::find($id);
        $agent->delete();
        // Session::flash('SUCCESS', 'تم حذف الوكيل بنجاح');
        toast('تم حذف الوكيل بنجاح', 'success');


        return redirect()->route('agents.index');
    }
}