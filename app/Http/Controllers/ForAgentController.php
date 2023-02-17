<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Daily_restriction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ForAgentController extends Controller
{
    public function index()
    {
        return view('agents.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'user_name'   => 'required',
            'password'  => 'required|min:3'
        ]);

        $agent = Agent::where('user_name', $request->user_name)->first();
        if ($agent) {

            if (Hash::check($request->password, $agent->password)) {
                $debtor = Daily_restriction::where('debtor', $agent->tree4_code)->orderBy('id', 'DESC')->get();
                $Creditor = Daily_restriction::where('Creditor', $agent->tree4_code)->orderBy('id', 'DESC')->get();
                $id = 1;
                return view('agents.agents_show', compact(
                    'debtor',
                    'Creditor',
                    'id',
                    'agent'
                ));
            } else {
                toast('عفوا البيانات التي ادخلتها غير صحيحة ', 'error');
                return back();
            }
        } else {

            toast('عفوا البيانات التي ادخلتها غير صحيحة ', 'error');
            return back();
        }
    }
}
