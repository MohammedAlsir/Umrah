<?php

namespace App\Http\Controllers;

use App\Models\Status_process_visa;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $status = Status_process_visa::orderBy('id', 'DESC')->get();
        $id = 1;
        return view('status.index', compact('status', 'id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('status.create');
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
            // 'belongs_to'        => 'required',
        ));
        //Insert
        $status = new Status_process_visa();
        $status->name = $request->name;
        // $status->belongs_to =  $request->belongs_to;

        $status->save();

        toast('تم  إضافة الحالة بنجاح', 'success');


        // redirect
        return redirect()->route('status.index');
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
        $status = Status_process_visa::find($id);
        return view('status.edit', compact('status'));
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
            // 'belongs_to'        => 'required',
        ));
        //Insert
        $status =  Status_process_visa::find($id);
        $status->name = $request->name;
        // $status->belongs_to =  $request->belongs_to;

        $status->save();

        toast('تم تعديل الحالة بنجاح', 'success');


        // redirect
        return redirect()->route('status.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $status = Status_process_visa::find($id);
        $status->delete();

        toast('تم حذف الحالة بنجاح', 'success');

        return redirect()->route('status.index');
    }
}