<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;

class HomeController extends BaseController
{
    public function home(Request $request)
    {
        return view('dashboard.home');
    }
}
