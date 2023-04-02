<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;

class UsersController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('id', '!=', 1)->where('id', '!=', Auth::user()->id)->get();
        $id = 1;
        return view('Users.index', compact('users', 'id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Users.create');
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
            'email'        => 'required|unique:users',
            'password'        => 'required',

        ));

        //Insert

        $user = new User;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);


        $user->regiment_status = $request->regiment_status;
        $user->agent_status = $request->agent_status;
        $user->company_status = $request->company_status;
        $user->requirement_status = $request->requirement_status;
        $user->process_status = $request->process_status;
        $user->ticket_status = $request->ticket_status;
        $user->final_delivery_status = $request->final_delivery_status;
        $user->trees_status = $request->trees_status;
        $user->accounts_status = $request->accounts_status;
        $user->check_account_status = $request->check_account_status;
        $user->users_status = $request->users_status;
        $user->report_status = $request->report_status;
        $user->setting_status = $request->setting_status;
        $user->dollar_price_status = $request->dollar_price_status;





        $user->save();

        toast('تم إضافة المستخدم بنجاح', 'success');

        // Session::flash('SUCCESS', 'تم إضافة المستخدم بنجاح');


        // redirect
        return redirect()->route('users.index');
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
        $user = User::find($id);
        return view('Users.edit', compact('user'));
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
        $user =  User::find($id);

        $this->validate($request, array(
            'name'        => 'required',
            'email' => ['required', Rule::unique('users')->ignore($user)],

            'password'        => '',

        ));

        //Insert


        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->regiment_status = $request->regiment_status;
        $user->agent_status = $request->agent_status;
        $user->company_status = $request->company_status;
        $user->requirement_status = $request->requirement_status;
        $user->process_status = $request->process_status;
        $user->ticket_status = $request->ticket_status;
        $user->final_delivery_status = $request->final_delivery_status;
        $user->trees_status = $request->trees_status;
        $user->accounts_status = $request->accounts_status;
        $user->check_account_status = $request->check_account_status;
        $user->users_status = $request->users_status;
        $user->report_status = $request->report_status;
        $user->setting_status = $request->setting_status;
        $user->dollar_price_status = $request->dollar_price_status;



        $user->save();

        toast('تم تعديل بيانات المستخدم بنجاح', 'success');

        // Session::flash('SUCCESS', 'تم تعديل بيانات المستخدم بنجاح');


        // redirect
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        toast('تم  حذف المستخدم بنجاح', 'success');

        // Session::flash('SUCCESS', 'تم  حذف المستخدم بنجاح');

        return redirect()->route('users.index');
    }


    public function del()
    {

        if (Auth::user()->id == 1) {
            Artisan::call("migrate:fresh");
            Artisan::call("db:seed");
            return redirect()->route('home');
        } else {
            return redirect()->route('home');
        }
    }
}