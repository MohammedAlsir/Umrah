<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;

class SettingController extends Controller
{
    private $uploadPath = "uploads/setting/";
    private $uploadPath_profile = "uploads/profile/";

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    public function dollar_price()
    {
        $setting = Setting::find(1);
        return view('setting.dollar_price', compact('setting'));
    }

    public function dollar_price_edit(Request $request)
    {
        $setting = Setting::find(1);
        $setting->dollar_price = $request->dollar_price;
        $setting->sr_price = $request->sr_price;
        $setting->save();
        // Session::flash('SUCCESS', 'تم  التعديل  بنجاح');
        toast('تم التعديل بنجاح', 'success');


        return view('setting.dollar_price', compact('setting'));
    }


    public function settings()
    {
        $setting = Setting::find(1);
        return view('setting.index', compact('setting'));
    }

    public function settings_edit(Request $request)
    {
        $setting = Setting::find(1);

        // Start of Upload Files
        $formFileName = "logo";
        $fileFinalName = "";
        if ($request->$formFileName != "") {
            // Delete file if there is a new one
            if ($setting->$formFileName != "") {
                File::delete($this->uploadPath . $setting->$formFileName);
            }
            $fileFinalName = time() . rand(
                1111,
                9999
            ) . '.' . $request->file($formFileName)->getClientOriginalExtension();
            $path = $this->uploadPath;
            $request->file($formFileName)->move($path, $fileFinalName);
        }


        if ($fileFinalName != "") {
            $setting->logo = $fileFinalName;
        }

        $setting->office_name = $request->office_name;
        $setting->address = $request->address;
        $setting->license_number = $request->license_number;

        $setting->phone_1 = $request->phone_1;
        $setting->phone_2 = $request->phone_2;
        $setting->email_1 = $request->email_1;
        $setting->email_2 = $request->email_2;

        $setting->save();
        toast('تم التعديل بنجاح', 'success');

        // Session::flash('SUCCESS', 'تم  التعديل  بنجاح');

        return view('setting.index', compact('setting'));
    }


    public function profile()
    {
        $user = User::find(auth()->user()->id);
        return view('profile.index', compact('user'));
    }

    public function profile_edit(Request $request)
    {
        $user = User::find(auth()->user()->id);

        $this->validate($request, array(
            'name'        => 'required',
            'email' => ['required', Rule::unique('users')->ignore($user)],

            'password'        => '',

        ));

        // Start of Upload Files
        $formFileName = "photo";
        $fileFinalName = "";
        if ($request->$formFileName != "") {
            // Delete file if there is a new one
            if ($user->$formFileName != "") {
                File::delete($this->uploadPath_profile . $user->$formFileName);
            }
            $fileFinalName = time() . rand(
                1111,
                9999
            ) . '.' . $request->file($formFileName)->getClientOriginalExtension();
            $path = $this->uploadPath_profile;
            $request->file($formFileName)->move($path, $fileFinalName);
        }


        if ($fileFinalName != "") {
            $user->photo = $fileFinalName;
        }

        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }


        $user->save();
        toast('تم التعديل بنجاح', 'success');

        // Session::flash('SUCCESS', 'تم  التعديل  بنجاح');

        return redirect()->route('profile');
    }
}