<?php

namespace App\Http\Controllers;

use App\Models\Daily_restriction;
use App\Models\Process;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FinalDeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dollar_price = Setting::find(1);
        $daily_restrictions = Daily_restriction::where('registration_number', '>=', 1);
        $daily_restrictions2 = Daily_restriction::where('registration_number', '>=', 1);
        $daily_restrictions3 = Daily_restriction::where('registration_number', '>=', 1);
        $daily_restrictions4 = Daily_restriction::where('registration_number', '>=', 1);
        $daily_restrictions5 = Daily_restriction::where('registration_number', '>=', 1);
        $id = 1;
        $id_check = 1;

        $process = Process::all();
        return view('final_delivery.index', compact(
            'process',
            'dollar_price',
            'daily_restrictions',
            'daily_restrictions2',
            'daily_restrictions3',
            'daily_restrictions4',
            'daily_restrictions5',
            'id',
            'id_check'
        ));
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
        //
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
        $one = Process::find($id);
        if ($one->status == 0) {
            $one->status = 1;
            toast('تم  التسليم  ', 'success');
        } elseif ($one->status == 1) {
            $one->status = 0;
            toast('تم  الغاء التسليم ', 'success');
        }
        $one->save();

        // $process = Process::all();

        // Session::flash('SUCCESS', 'تم  الحفظ بنجاح');


        return redirect()->route('final_delivery.index');
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