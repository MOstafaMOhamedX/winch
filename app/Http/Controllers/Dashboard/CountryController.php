<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\StoreCountryRequest as StoreModelRequest;
use App\Http\Requests\Dashboard\UpdateCountryRequest as UpdateModelRequest;
use App\Models\Country as Model;
use App\Models\Region;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:countries-list', ['only' => ['index', 'store']]);
        $this->middleware('permission:countries-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:countries-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:countries-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $Models = Model::latest()->get();

        return view('dashboard.countries.index', compact('Models'));
    }

    public function create()
    {
        return view('dashboard.countries.create');
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

        return view('dashboard.countries.show', compact('Model'));
    }

    public function edit($id)
    {
        $Model = Model::find($id);

        return view('dashboard.countries.edit', compact('Model'));
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
