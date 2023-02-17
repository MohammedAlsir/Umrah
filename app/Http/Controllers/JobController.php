<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\JobRequest;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Job::orderBy('id', 'DESC')->get();
        $id = 1;
        return view('jobs.index', compact('jobs', 'id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jobs.create');
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
            'description'        => 'required',
        ));
        //Insert
        $jobs = new Job();
        $jobs->name = $request->name;
        $jobs->description = $request->description;

        $jobs->save();

        toast('تم  إضافة الوظيفة بنجاح', 'success');


        // redirect
        return redirect()->route('jobs.index');
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
        $jobs = Job::find($id);
        return view('jobs.edit', compact('jobs'));
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
            'description'        => 'required',
        ));
        //Insert
        $jobs = Job::find($id);
        $jobs->name = $request->name;
        $jobs->description = $request->description;

        $jobs->save();

        toast('تم  تعديل الوظيفة بنجاح', 'success');


        // redirect
        return redirect()->route('jobs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $job = Job::find($id);
        $job->delete();

        toast('تم حذف الوظيفة بنجاح', 'success');

        return redirect()->route('jobs.index');
    }

    public function job_requests()
    {
        $id = 1;
        $requests = JobRequest::orderBy('id', 'DESC')->get();
        return view('jobs.requests', compact('requests', 'id'));
    }
}
