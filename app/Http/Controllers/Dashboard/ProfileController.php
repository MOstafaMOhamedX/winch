<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function __construct()
    {
        // $this->middleware('role:Admin|Agent');
    }

    public function show()
    {
        return view('auth.profile');
    }

    public function update(Request $request)
    {
        if ($request->password) {
            auth()->user()->update(['password' => Hash::make($request->password)]);
        }
        if ($request->country_code && $request->phone_code) {
            auth()->user()->update($request->only('country_code', 'phone_code'));
        }
        auth()->user()->update($request->only('name', 'email', 'phone'));

        alert()->success(__('updatedSuccessfully'));

        return redirect()->back();
    }
}
