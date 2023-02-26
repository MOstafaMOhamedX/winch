<?php

namespace App\Http\Controllers\API;

use App\Functions\ResponseHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class BaseController extends Controller
{
    public $user;
    public $currency_id;
    public function __construct(Request $request)
    {
        app()->setLocale($request->lang ?? 'en');
    }

    public function CheckAuth()
    {
        if(!auth('sanctum')->check())
            return ResponseHelper::make((object)[], __('You not auth'), true, 404);
        else
            $this->user = auth('sanctum')->user();
    }
    public function CheckCount($Data)
    {
        if(in_array(Route::currentRouteName(), ['addresses.index'])){
            if ($Data->count() < 1)
                return ResponseHelper::make([], __('Data not found'), true, 404);
        }
        if ($Data->count() < 1)
            return ResponseHelper::make((object)[], __('Data not found'), true, 404);
    }
    public function CheckExist($Model)
    {
        if (!$Model)
            return ResponseHelper::make((object)[], __('Data not found'), true, 404);
    }
}
