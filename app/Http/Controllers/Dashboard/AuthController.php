<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function Login(Request $request)
    {
        if (auth('admin')->attempt($request->only('email', 'password'), request('remember'))) {
            return redirect()->route('admin.home');
        } else {
            return redirect()->back()->with('danger', 'email or password is incorrect');
        }
    }

    public function Logout()
    {

    }

}
