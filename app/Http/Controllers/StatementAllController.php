<?php

namespace App\Http\Controllers;

use App\Models\Daily_restriction;
use App\Models\Tree4;
use Illuminate\Http\Request;

class StatementAllController extends Controller
{
    public function index()
    {
        $tree4s = Tree4::all();
        return view('statement.index', compact('tree4s'));
    }


    public function show(Request $request)
    {
        $debtor = Daily_restriction::where('debtor', $request->tree4)->whereDate('created_at', '>=', $request->start)->whereDate('created_at', '<=', $request->end)->orderBy('id', 'DESC')->get();
        $Creditor = Daily_restriction::where('Creditor', $request->tree4)->whereDate('created_at', '>=', $request->start)->whereDate('created_at', '<=', $request->end)->orderBy('id', 'DESC')->get();

        $id = 1;

        return view('statement.show', compact(
            'debtor',
            'Creditor',
            'id'
        ));
    }
}
