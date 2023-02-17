<?php

namespace App\Http\Controllers;

use App\Models\Daily_restriction;
use App\Models\Tree4;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use NumberToWords\NumberToWords;


class BondController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
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

    // سندات القبض
    public function receipt()
    {
        $tree4 = Tree4::all();

        $daily = Daily_restriction::where('type', 2)->get();
        $id = 1;
        return view('bond.receipt', compact('daily', 'id', 'tree4'));
    }

    // سندات القبض
    public function receipt_save(Request $request)
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
        $daily->type = 2;

        if ($check) {
            $daily->registration_number = $check->registration_number + 1;
        } else {
            $daily->registration_number =  1;
        }


        $daily->save();

        // Session::flash('SUCCESS', 'تم  الاضافة بنجاح');
        toast('تم الاضافة بنجاح', 'success');


        return redirect()->route('receipt_show', $daily->id);
    }


    // سندات الصرف
    public function exchange()
    {
        $tree4 = Tree4::all();
        $daily = Daily_restriction::where('type', 3)->get();
        $id = 1;
        return view('bond.exchange', compact('daily', 'id', 'tree4'));
    }

    // سندات الصرف
    public function exchange_save(Request $request)
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
        $daily->type = 3;

        if ($check) {
            $daily->registration_number = $check->registration_number + 1;
        } else {
            $daily->registration_number =  1;
        }

        // create the number to words "manager" class

        $daily->save();

        // Session::flash('SUCCESS', 'تم  الاضافة بنجاح');
        toast('تم الاضافة بنجاح', 'success');



        return redirect()->route('exchange_show', $daily->id);
    }

    public function exchange_show($daily_id)
    {
        $daily = Daily_restriction::find($daily_id);

        $numberToWords = new NumberToWords();

        // build a new number transformer using the RFC 3066 language identifier
        $numberTransformer = $numberToWords->getNumberTransformer('ar');

        $numberTransformer->toWords($daily->price);

        return view('bond.show.exchange', compact('daily', 'numberTransformer'));
    }

    public function receipt_show($daily_id)
    {
        $daily = Daily_restriction::find($daily_id);

        $numberToWords = new NumberToWords();

        // build a new number transformer using the RFC 3066 language identifier
        $numberTransformer = $numberToWords->getNumberTransformer('ar');

        $numberTransformer->toWords($daily->price);

        return view('bond.show.receipt', compact('daily', 'numberTransformer'));
    }
}