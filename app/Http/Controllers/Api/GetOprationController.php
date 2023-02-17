<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Daily_restriction;
use App\Models\Job;
use App\Models\JobRequest;
use App\Models\Process;
use App\Models\Setting;
use App\Models\Visa;
use App\Traits\ApiMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GetOprationController extends Controller
{
    use ApiMessage;

    public function account_statement(Request $request)
    {
        // $user =
        // $debtor = Daily_restriction::whereBetween('type', [$request->start, $request->end])->get();

        // Reservation::whereBetween('reservation_from', [$from, $to])->get();


        // User::whereBetween(DB::raw('DATE(created_at)'), array($from_date, $to_date))->get();

        $debtor = Daily_restriction::where('debtor', Auth::user()->tree4_code)->orderBy('id', 'DESC')->get();
        $Creditor = Daily_restriction::where('Creditor', Auth::user()->tree4_code)->orderBy('id', 'DESC')->get();

        return response()->json([
            'status'    => true,
            'message'   => "",
            // 'token'     => $token,
            'debtor'        => $debtor,
            'Creditor'        => $Creditor,
        ], 200);
    }

    public function office_data()
    {
        $setting = Setting::find(1);

        return $this->returnData('office_data', $setting);
    }

    public function jobs()
    {
        $jobs = Job::orderBy('id', 'DESC')->get();

        return $this->returnData('jobs', $jobs);
    }

    public function applying(Request $request)
    {
        $data = $request->validate([
            'name'     => 'required',
            'countery'  => 'required',
            'phone'  => 'required',
            'note'  => 'required',
            'job_id'  => 'required'
        ]);

        if (Job::find($request->job_id)) {
            $reques_job =  new JobRequest();

            $data_return = $reques_job->create($data);

            return $this->returnData('reques_job', $data_return);
        } else {
            return $this->returnMessage(false, 'عفوا هذه الوظيفة غير موجودة', 200);
        }
    }


    public function get_process(Request $request)
    {
        $data = $request->validate([
            'code'     => 'required',
        ]);
        $process = Process::where('code', $request->code)->get();

        if ($process->count() > 0)
            return $this->returnData('process', $process);
        else
            return $this->returnMessage(false, 'عفوا هذه المعاملة غير موجودة', 200);
    }


    public function get_visa(Request $request)
    {
        $data = $request->validate([
            'code'     => 'required',
        ]);
        $visa = Visa::where('code', $request->code)->get();

        if ($visa->count() > 0)
            return $this->returnData('visa', $visa);
        else
            return $this->returnMessage(false, 'عفوا هذه التأشيرة غير موجودة', 200);
    }
}