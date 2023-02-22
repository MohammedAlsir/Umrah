<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Daily_restriction;
use App\Models\Process;
use App\Models\Regiment;
use App\Models\Ticket;
use App\Models\Type_process;
use App\Models\Visa;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $count_0 = Regiment::where('status', '0')->count();
        $count_1 = Regiment::where('status', '1')->count();

        $agent = Agent::count();
        $visa = Visa::count();
        $ok = Process::where('status', 1)->count();
        $no = Process::where('status', 0)->count();

        $bank = Daily_restriction::whereBetween('debtor', ['120300001', '120399999'])->sum('price') - Daily_restriction::whereBetween('Creditor', ['120300001', '120399999'])->sum('price');
        $cash = Daily_restriction::whereBetween('debtor', ['120200001', '120299999'])->sum('price') - Daily_restriction::whereBetween('Creditor', ['120200001', '120299999'])->sum('price');

        $types1 = Ticket::where('status', 'رضيع')->count();
        $types2 = Ticket::where('status', 'طفل')->count();
        $types3 = Ticket::where('status', 'بالغ')->count();


        $process = Process::all();

        return view('home', compact(
            'count_0',
            'count_1',
            'agent',
            'visa',
            'ok',
            'no',
            'bank',
            'cash',
            'types1',
            'types2',
            'types3',
            'process'
        ));
    }
}
