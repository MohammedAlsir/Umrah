<?php

namespace App\Http\Controllers;

use App\Models\Beneficiary;
use App\Models\Company;
use App\Models\Daily_restriction;
use App\Models\Regiment;
use App\Models\Tree4;
use App\Traits\Oprations;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RegimentController extends Controller
{
    use Oprations;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->index_data(Regiment::class, "regiment.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $trees = Tree4::where('tree3_code', '1203')->orWhere('tree3_code', '1202')->get();
        $companies = Company::all();
        $last_regiment = 1;
        if (Regiment::orderBy('id', 'desc')->first())
            $last_regiment = Regiment::orderBy('id', 'desc')->first()->id + 1;
        return view('regiment.create', compact('last_regiment', 'companies', 'trees'));
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
            'list_bennficiary.*.name' => 'required',
            'list_bennficiary.*.phone' => 'required',
        ));
        // return $request;
        //Insert
        $regiment = new Regiment();
        $regiment->num_day = $request->num_day;
        $regiment->hotel_cost = $request->hotel_cost;
        $regiment->relay_cost = $request->relay_cost;
        $regiment->airline_name = $request->airline_name;
        $regiment->airline_cost = $request->airline_cost;
        $regiment->save();

        $all_request = $request->list_bennficiary;

        if ($all_request) {

            foreach ($all_request as $item) {
                $beneficiary = new Beneficiary();
                $beneficiary->name = $item['name'];
                $beneficiary->phone = $item['phone'];
                $beneficiary->regiment_id = $regiment->id;
                $beneficiary->save();
            }
        }

        // Begin

        $daily =  new Daily_restriction();
        $check =  Daily_restriction::orderBy('id', 'DESC')->first();


        $daily->price = $request->hotel_cost + $request->relay_cost + $request->airline_cost;
        $daily->date = Carbon::now()->Format('Y-m-d');
        $daily->Statement = $request->Statement;
        $daily->type = 5;

        $daily->Creditor = $request->tree4_code;
        $daily->regiment_id = $regiment->id;


        if ($check) {
            $daily->registration_number = $check->registration_number + 1;
        } else {
            $daily->registration_number =  1;
        }

        $daily->save();

        // end


        // Session::flash('SUCCESS', 'تم إضافة وكيل  جديد بنجاح');
        toast('تمت الاضافة  بنجاح', 'success');

        // redirect
        return redirect()->route('regiment.index');
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
        $companies = Company::all();
        $trees = Tree4::where('tree3_code', '1203')->orWhere('tree3_code', '1202')->get();

        $item = Regiment::find($id);
        $bennficiaries = Beneficiary::where('regiment_id', $item->id)->get();
        return view('regiment.edit', compact('item', 'companies', 'bennficiaries', 'trees'));
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
        // $this->validate($request, array(
        //     'list_bennficiary.*.name' => 'required',
        //     'list_bennficiary.*.phone' => 'required',
        // ));
        // return $request;
        //Insert
        $regiment =  Regiment::find($id);
        $regiment->num_day = $request->num_day;
        $regiment->hotel_cost = $request->hotel_cost;
        $regiment->relay_cost = $request->relay_cost;
        $regiment->airline_name = $request->airline_name;
        $regiment->airline_cost = $request->airline_cost;
        $regiment->save();

        $all_request = $request->list_bennficiary;

        foreach (Beneficiary::where('regiment_id', $id)->get() as $single) {
            $single->delete();
        }

        if ($all_request) {

            foreach ($all_request as $item) {
                if ($item['name'] != '' && $item['phone'] != '') {
                    $beneficiary = new Beneficiary();
                    $beneficiary->name = $item['name'];
                    $beneficiary->phone = $item['phone'];
                    $beneficiary->regiment_id = $regiment->id;
                    $beneficiary->save();
                }
            }
        }

        // Begin

        $daily =  Daily_restriction::where('regiment_id', $id)->first();

        $daily->price = $request->hotel_cost + $request->relay_cost + $request->airline_cost;
        $daily->date = Carbon::now()->Format('Y-m-d');
        $daily->Statement = $request->Statement;
        $daily->Creditor = $request->tree4_code;

        $daily->save();

        // end

        // Session::flash('SUCCESS', 'تم إضافة وكيل  جديد بنجاح');
        toast('تمت الاضافة  بنجاح', 'success');

        // redirect
        return redirect()->route('regiment.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $regiment = Regiment::find($id)->delete();
        if (Daily_restriction::where('regiment_id', $id)->first()) {
            Daily_restriction::where('regiment_id', $id)->first()->delete();
        }

        toast('تم الحذف  بنجاح', 'success');

        // redirect
        return redirect()->route('regiment.index');
    }
}
