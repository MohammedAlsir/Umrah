<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Company;
use App\Models\Process;
use App\Models\Regiment;
use App\Models\Ticket;
use App\Models\Type_process;
use App\Models\User;
use App\Models\Visa;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('reports.index');
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

    // Coustom Funtion

    public function visa()
    {
        $agents = Agent::all();
        return view('reports.visa.index', compact('agents'));
    }

    public function visa_post(Request $request)
    {
        if ($request->agent_id == 'all') {
            $visas = Visa::whereDate('created_at', '>=', $request->start)->whereDate('created_at', '<=', $request->end)->get();
        } else {
            $visas = Visa::where('agent_id', $request->agent_id)
                ->whereDate('created_at', '>=', $request->start)->whereDate('created_at', '<=', $request->end)->get();
        }

        $id = 1;
        return view('reports.visa.show', compact('visas', 'id'));
    }

    public function process()
    {
        $types = Type_process::all();
        $agents = Agent::all();

        return view('reports.process.index', compact('types', 'agents'));
    }

    public function process_post(Request $request)
    {
        if ($request->type == 'all') {
            if ($request->status == 'all') {
                if ($request->agent_id == 'all') {
                    $process = Process::whereDate('created_at', '>=', $request->start)->whereDate('created_at', '<=', $request->end)->get();
                } else {
                    $process = Process::where('agent_id', $request->agent_id)->whereDate('created_at', '>=', $request->start)->whereDate('created_at', '<=', $request->end)->get();
                }
            } else {
                if ($request->agent_id == 'all') {
                    $process = Process::where('status', $request->status)->whereDate('created_at', '>=', $request->start)->whereDate('created_at', '<=', $request->end)->get();
                } else {
                    $process = Process::where('agent_id', $request->agent_id)->where('status', $request->status)->whereDate('created_at', '>=', $request->start)->whereDate('created_at', '<=', $request->end)->get();
                }
            }
        } else {
            if ($request->status == 'all') {
                if ($request->agent_id == 'all') {
                    $process = Process::where('type_processe_id', $request->type)
                        ->whereDate('created_at', '>=', $request->start)->whereDate('created_at', '<=', $request->end)->get();
                } else {
                    $process = Process::where('agent_id', $request->agent_id)->where('type_processe_id', $request->type)
                        ->whereDate('created_at', '>=', $request->start)->whereDate('created_at', '<=', $request->end)->get();
                }
            } else {
                if ($request->agent_id == 'all') {
                    $process = Process::where('status', $request->status)->where('type_processe_id', $request->type)
                        ->whereDate('created_at', '>=', $request->start)->whereDate('created_at', '<=', $request->end)->get();
                } else {
                    $process = Process::where('agent_id', $request->agent_id)->where('status', $request->status)->where('type_processe_id', $request->type)
                        ->whereDate('created_at', '>=', $request->start)->whereDate('created_at', '<=', $request->end)->get();
                }
            }
        }

        $id = 1;
        return view('reports.process.show', compact('process', 'id'));
    }

    public function regiment()
    {
        $regiments = Regiment::all();

        return view('reports.regiment.index', compact('regiments'));
    }

    public function regiment_post(Request $request)
    {
        $count_0 = Regiment::where('status', '0')->count();
        $count_1 = Regiment::where('status', '1')->count();
        if ($request->regiment == 'all') {
            $regiments = Regiment::all();
            // $regiments = Regiment::whereDate('created_at', '>=', $request->start)->whereDate('created_at', '<=', $request->end)->get();
        } else {
            $regiments = Regiment::where('id', $request->regiment)->get();
            // $regiments = Regiment::where('id', $request->regiment)->whereDate('created_at', '>=', $request->start)->whereDate('created_at', '<=', $request->end)->get();
        }

        $id = 1;
        return view('reports.regiment.show', compact('regiments', 'id', 'count_0', 'count_1'));
    }


    public function ticket()
    {
        $companies = Company::all();
        $users = User::all();

        return view('reports.ticket.index', compact('companies', 'users'));
    }

    public function ticket_post(Request $request)
    {
        if ($request->company == 'all') {
            // $company = Company::all();
            if ($request->users == 'all') {
                $tikets = Ticket::all()->groupBy('company_id');
            } else {
                $tikets = Ticket::where('user_id', $request->users)->get()->groupBy('company_id');
            }
        } else {
            // $company = Company::where('id', $request->company)->get();
            if ($request->users == 'all') {
                $tikets = Ticket::where('company_id', $request->company)->get()->groupBy('company_id');
            } else {
                $tikets = Ticket::where('user_id', $request->users)->where('company_id', $request->company)->get()->groupBy('company_id');
            }
        }



        // return
        // dd($tikets);
        $id = 1;
        $user_id = $request->users;
        return view('reports.ticket.show', compact('tikets', 'id', 'user_id'));
    }


    public function ticket_beneficiary($company_id, $user_id)
    {
        $id = 1;
        if ($user_id != "all") {
            $tickets = Ticket::where('user_id', $user_id)->where('company_id', $company_id)->get();
        } else {
            $tickets = Ticket::where('company_id', $company_id)->get();
        }

        return view('reports.ticket.beneficiary', compact('tickets', 'id'));
    }
}