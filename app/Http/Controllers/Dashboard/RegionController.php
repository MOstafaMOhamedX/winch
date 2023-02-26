<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\StoreRegionRequest as StoreModelRequest;
use App\Http\Requests\Dashboard\UpdateRegionRequest as UpdateModelRequest;
use App\Models\Country;
use App\Models\Region;
use App\Models\Region as Model;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:regions-list', ['only' => ['index', 'store']]);
        $this->middleware('permission:regions-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:regions-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:regions-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $Models = Model::where('country_id', request()->country)->latest()->get();

        return view('dashboard.regions.index', compact('Models'));
    }

    public function create()
    {
        $Countries = Country::get();

        return view('dashboard.regions.create', compact('Countries'));
    }

    public function store(StoreModelRequest $request)
    {
        Model::latest()->create($request->validated());
        alert()->success(__('addedSuccessfully'));

        return redirect()->back();
    }

    public function show($id)
    {
        $Model = Model::find($id);
        if (request()->delivery_cost) {
            Region::where('country_id', $Model->id)->update([
                'delivery_cost' => request()->delivery_cost,
            ]);
        }

        return view('dashboard.regions.show', compact('Model'));
    }

    public function edit($id)
    {
        $Model = Model::find($id);
        $Countries = Country::get();

        return view('dashboard.regions.edit', compact('Model', 'Countries'));
    }

    public function update(UpdateModelRequest $request, $id)
    {
        $Model = Model::find($id);
        $Model->update($request->validated());
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
