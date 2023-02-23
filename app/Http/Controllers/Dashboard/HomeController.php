<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\API\BaseController;
use Illuminate\Http\Request;


class HomeController extends BaseController
{

    public function Login(Request $request)
    {

        if ($request->method() == 'POST') {


           $credentials = $request->only('email', 'password');

        if (auth('admin')->attempt($credentials, request('remember'))) {
            return redirect()->intended('dashboard');

        } else {
            return redirect()->back()->with('danger', 'email or password is incorrect');
        }

    } else {
        return view('auth.login');
    }
    }

    public function Logout()
    {

    }



}
