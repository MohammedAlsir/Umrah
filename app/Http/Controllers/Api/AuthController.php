<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Traits\ApiMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    use ApiMessage;
    /*
        == Login function ==
        == Receive email & password  ==
    */
    public function login(Request $request)
    {
        $data = $request->validate([
            'user_name'     => 'required',
            'password'  => 'required|min:8'
        ]);

        // == begin attempt ==
        if (Auth::guard('agents')->attempt($data)) {
            // == Create Token ==
            $token = Auth::guard('agents')->user()->createToken('Token')->accessToken;
            //  == return user data with token ==
            // return $this->returnData('user', Auth::guard('agents')->user(), $token);
            return $this->returnData('user', Auth::guard('agents')->user(), $token);
        } else
            // == there is error ==
            return $this->returnMessage(false, 'عفوا , هناك خطأ في كلمة المرور او  اسم المستخدم ', 200);
        // == end attempt ==
    }
}
