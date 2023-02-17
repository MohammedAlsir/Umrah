<?php

namespace App\Http\Controllers;

use App\Models\Requirement;
use App\Models\Type_process;
use Illuminate\Http\Request;

class RequirementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requirement = Requirement::orderBy('id', 'DESC')->get();
        $id = 1;
        return view('requirements.index', compact('requirement', 'id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $type = Type_process::all();
        return view('requirements.create', compact('type'));
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
        $requirement = new Requirement();
        $requirement->name = $request->name;
        // $requirement->belongs_to = 1;

        $requirement->save();

        toast('تم  إضافة المتطلب بنجاح', 'success');


        // redirect
        return redirect()->route('requirement.index');
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
        $requirement = Requirement::find($id);
        return view('requirements.edit', compact('requirement'));
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
        $requirement = Requirement::find($id);

        $requirement->name = $request->name;
        // $requirement->belongs_to = 1;

        $requirement->save();

        toast('تم  تعديل بيانات المتطلب بنجاح', 'success');


        // redirect
        return redirect()->route('requirement.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $requirement = Requirement::find($id);
        $requirement->delete();

        toast('تم حذف المتطلب بنجاح', 'success');

        return redirect()->route('requirement.index');
    }
}