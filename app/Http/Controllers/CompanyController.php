<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::orderBy('id', 'DESC')->get();
        $id = 1;
        return view('company.index', compact('companies', 'id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.create');
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
            'phone'        => 'required',

        ));
        //Insert
        $company = new Company();
        $company->name = $request->name;
        $company->phone = $request->phone;
        $company->save();


        // Session::flash('SUCCESS', 'تم إضافة وكيل  جديد بنجاح');
        toast('تم  إضافة شركة الطيران بنجاح', 'success');


        // redirect
        return redirect()->route('company.index');
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
        $company = Company::find($id);
        return view('company.edit', compact('company'));
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
            'phone'        => 'required',

        ));
        //Insert
        $company = Company::find($id);
        $company->name = $request->name;
        $company->phone = $request->phone;
        $company->save();


        toast('تم  تعديل بيانات شركة الطيران بنجاح', 'success');


        // redirect
        return redirect()->route('company.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Company::find($id);

        $company->delete();

        toast('تم  حذف شركة الطيران بنجاح', 'success');


        // redirect
        return redirect()->route('company.index');
    }
}
