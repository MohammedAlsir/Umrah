<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Process;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = 1;

        $tickets = Ticket::all();
        return view('ticket.index', compact(
            'tickets',
            'id',
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = 1;

        $process = Process::all();
        return view('ticket.new_ticket', compact(
            'process',
            'id',
        ));
    }

    public function cut_ticket($id)
    {
        $process = Process::find($id);
        $company = Company::all();
        return view('ticket.create', compact('process', 'company'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ticket = new Ticket();
        $ticket->name = $request->name;
        $ticket->price = $request->price;
        $ticket->status = $request->status;
        $ticket->visa_number = $request->visa_number;

        $ticket->company_id = $request->company_id;

        $ticket->processe_id = $request->processe_id;

        $ticket->save();

        toast('تم  الحجز بنجاح', 'success');


        return redirect()->route('ticket.show', $ticket->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ticket = Ticket::find($id);
        return view('ticket.show', compact('ticket'));
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
        $ticket = Ticket::find($id);
        $ticket->delete();
        toast('تم  إلغاء الحجز بنجاح', 'success');


        return redirect()->route('ticket.index');
    }
}