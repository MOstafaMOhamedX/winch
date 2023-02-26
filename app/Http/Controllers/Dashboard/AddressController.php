<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\StoreAddressRequest as StoreModelRequest;
use App\Http\Requests\Dashboard\UpdateAddressRequest as UpdateModelRequest;
use App\Models\Address as Model;
use App\Models\Client;
use App\Models\Region;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:address-list', ['only' => ['index', 'store']]);
        $this->middleware('permission:address-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:address-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:address-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $Models = Model::where('client_id', request()->client)->with('client', 'region')->get();
        $Client = Client::find(request()->client);

        return view('dashboard.addresses.index', compact('Models', 'Client'));
    }

    public function create()
    {
        $regions = Region::get();
        $Client = Client::find(request()->client);

        return view('dashboard.addresses.create', compact('regions', 'Client'));
    }

    public function store(StoreModelRequest $request)
    {
        Model::create($request->validated());
        alert()->success(__('addedSuccessfully'));

        return redirect()->back();
    }

    public function show()
    {
        return view('dashboard.addresses.show', compact('Model'));
    }

    public function edit()
    {
        $regions = Region::get();
        $Model = Model::find(request()->address);

        return view('dashboard.addresses.edit', compact('Model', 'regions'));
    }

    public function update(UpdateModelRequest $request)
    {
        $Model = Model::find(request()->address);
        $Model->update($request->validated());
        alert()->success(__('updatedSuccessfully'));

        return redirect()->back();
    }

    public function destroy()
    {
        $Model = Model::find(request()->address);
        $Model->delete();
        alert()->success(__('DeletedSuccessfully'));

        return redirect()->back();
    }
}
