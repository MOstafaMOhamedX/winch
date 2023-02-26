<?php

namespace App\Http\Controllers\Dashboard;

use App\Functions\Upload;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\StoreDriverRequest as StoreModelRequest;
use App\Http\Requests\Dashboard\UpdateDriverRequest  as UpdateModelRequest;
use App\Models\Driver as Model;
use Illuminate\Http\Request;

class DriversController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:drivers-list', ['only' => ['index', 'store']]);
        $this->middleware('permission:drivers-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:drivers-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:drivers-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $Models = Model::latest()->get();

        return view('dashboard.drivers.index', compact('Models'));
    }

    public function create()
    {
        return view('dashboard.drivers.create');
    }

    public function store(StoreModelRequest $request)
    {
        $Model = Model::create($request->only(['name', 'email', 'phone']));
        $Model->password = bcrypt($request->password);
        if ($request->hasFile('image')) {
            $Model->image = Upload::UploadFile($request->image, 'Drivers');
        }
        $Model->save();
        alert()->success(__('addedSuccessfully'));

        return redirect()->back();
    }

    public function show($id)
    {
        $Model = Model::where('id', $id)->firstorfail();

        return view('dashboard.drivers.show', compact('Model'));
    }

    public function edit($id)
    {
        $Model = Model::where('id', $id)->firstorfail();

        return view('dashboard.drivers.edit', compact('Model'));
    }

    public function update(UpdateModelRequest $request, $id)
    {
        $Model = Model::where('id', $id)->firstorfail();
        $Model->update($request->only(['name', 'email', 'phone']));
        if ($request->hasFile('image')) {
            $Model->image = Upload::UploadFile($request->image, 'Drivers');
        }
        if ($request->password) {
            $Model->password = bcrypt($request->password);
        }
        $Model->save();
        alert()->success(__('updatedSuccessfully'));

        return redirect()->back();
    }

    public function destroy($id)
    {
        $Model = Model::where('id', $id)->firstorfail();
        if (Model::count()) {
            $Model->delete();
            alert()->success(__('User successfully Deleted'));

            return redirect()->back();
        } else {
            alert()->error(__('cantDeleteElement'));

            return redirect()->back();
        }
    }
}
