<?php

namespace App\Http\Controllers;

use App\Models\Daily_restriction;
use App\Models\Tree4;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use NumberToWords\NumberToWords;

class AgentPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tree4 = Tree4::all();

        $daily = Daily_restriction::where('type', 4)->get();
        $id = 1;
        return view('AgentPayment.index', compact('daily', 'id', 'tree4'));
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
        // 1500 >   1500
        if ($request->price > $request->residual_2) {
            Session::flash('error', ' المبلغ ' .  number_format($request->price, 0) . ' اكبر من المبلغ المطلوب من الوكيل ');
            return redirect()->back();
        }
        $daily =  new Daily_restriction;
        $check =  Daily_restriction::latest()->first();


        $daily->debtor = $request->debtor;
        $daily->Creditor = $request->Creditor;
        $daily->price = $request->price;
        $daily->date = $request->date;
        $daily->Statement = $request->Statement;
        $daily->type = 4;

        if ($check) {
            $daily->registration_number = $check->registration_number + 1;
        } else {
            $daily->registration_number =  1;
        }
        $daily->save();
        // Session::flash('SUCCESS', 'تم  الاضافة بنجاح');
        toast('تم الاضافة بنجاح', 'success');


        // return redirect()->route('agent_payment.index');
        return redirect()->route('agent_payment.show', $daily->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $daily = Daily_restriction::find($id);

        $numberToWords = new NumberToWords();

        // build a new number transformer using the RFC 3066 language identifier
        $numberTransformer = $numberToWords->getNumberTransformer('ar');

        $numberTransformer->toWords($daily->price);


        return view('AgentPayment.show', compact('daily', 'numberTransformer'));
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
}