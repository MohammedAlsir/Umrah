<?php

namespace App\Http\Controllers;

use App\Models\Tree1;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class Tree1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tree1s = Tree1::all();
        $id = 1;
        return view('tree1.index', compact('tree1s', 'id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tree1 = new Tree1();

        $tree1->tree1_name = $request->tree1_name;

        $check = Tree1::all();

        if ($check->count() > 0) {
            $tree1->tree1_code = $check->last()->tree1_code + 1;
        } else {
            $tree1->tree1_code = 1;
        }
        $tree1->save();
        // notify()->success('تم الاضافة بنجاح');
        // toastr()->success('تم الاضافة بنجاح');
        toast('تم الاضافة بنجاح', 'success');


        // Session::flash('SUCCESS', 'تم الاضافة بنجاح');


        return redirect()->route('tree1.index');
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
        //
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
        $tree1 =  Tree1::find($id);

        $tree1->tree1_name = $request->tree1_name;

        $tree1->save();

        // Session::flash('SUCCESS', 'تم التعديل بنجاح');
        toast('تم التعديل بنجاح', 'success');


        return redirect()->route('tree1.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}