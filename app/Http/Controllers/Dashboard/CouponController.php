<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\StoreCouponRequest as StoreModelRequest;
use App\Http\Requests\Dashboard\UpdateCouponRequest as UpdateModelRequest;
use App\Models\Coupon as Model;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:coupons-list', ['only' => ['index', 'store']]);
        $this->middleware('permission:coupons-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:coupons-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:coupons-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $Models = Model::latest()->get();

        return view('dashboard.coupons.index', compact('Models'));
    }

    public function create()
    {
        return view('dashboard.coupons.create');
    }

    public function store(StoreModelRequest $request)
    {
        $Model = Model::latest()->create($request->only('code', 'type', 'discount', 'percent_off', 'from', 'to', 'status'));
        alert()->success(__('addedSuccessfully'));

        return redirect()->back();
    }

    public function show($id)
    {
        $Model = Model::find($id);

        return view('dashboard.coupons.show', compact('Model'));
    }

    public function edit($id)
    {
        $Model = Model::find($id);

        return view('dashboard.coupons.edit', compact('Coupon'));
    }

    public function update(UpdateModelRequest $request, $id)
    {
        $Model = Model::find($id);
        $Model->update($request->only('code', 'type', 'discount', 'percent_off', 'from', 'to', 'status'));
        alert()->success(__('updatedSuccessfully'));

        return redirect()->back();
    }

    public function destroy($id)
    {
        $Model = Model::find($id);
        $Model->delete();
        alert()->success(__('DeletedSuccessfully'));

        return redirect()->back();
    }
}
