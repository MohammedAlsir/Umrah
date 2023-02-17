<?php

namespace App\Http\Controllers;

use App\Models\Daily_restriction;
use App\Models\Tree4;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DailyRestrictionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tree4 = Tree4::all();
        $daily = Daily_restriction::where('type', 1)->get();
        $id = 1;
        return view('daily_restrictions.index', compact('tree4', 'daily', 'id'));
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

        $this->validate($request, array(
            'debtor'        => 'required',
            'Creditor'        => 'required',
            'price'        => 'required',
            'date'        => 'required',
        ));

        $daily =  new Daily_restriction;
        $check =  Daily_restriction::latest()->first();


        $daily->debtor = $request->debtor;
        $daily->Creditor = $request->Creditor;
        $daily->price = $request->price;
        $daily->date = $request->date;
        $daily->Statement = $request->Statement;
        $daily->type = 1;

        if ($check) {
            $daily->registration_number = $check->registration_number + 1;
        } else {
            $daily->registration_number =  1;
        }
        $daily->save();
        toast('تم إضافة القيد بنجاح', 'success');
        // Session::flash('SUCCESS', 'تم إضافة القيد بنجاح');

        return redirect()->route('daily_restrictions.index');
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
        $daily =   Daily_restriction::find($id);

        $this->validate($request, array(
            'debtor'        => 'required',
            'Creditor'        => 'required',
            'price'        => 'required',
            'date'        => 'required',
        ));



        $daily->debtor = $request->debtor;
        $daily->Creditor = $request->Creditor;
        $daily->price = $request->price;
        $daily->date = $request->date;
        $daily->Statement = $request->Statement;


        $daily->save();
        return redirect()->route('daily_restrictions.index');
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