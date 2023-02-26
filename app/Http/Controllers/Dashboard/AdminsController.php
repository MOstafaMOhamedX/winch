<?php

namespace App\Http\Controllers\Dashboard;

use App\Functions\Upload;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\StoreAdminRequest as StoreModelRequest;
use App\Http\Requests\Dashboard\UpdateAdminRequest  as UpdateModelRequest;
use App\Models\Admin as Model;
use Illuminate\Http\Request;

class AdminsController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:admins-list', ['only' => ['index', 'store']]);
        $this->middleware('permission:admins-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:admins-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:admins-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $Models = Model::whereHas('roles', function ($q) {
            $q->where('id', 1);
        })->get();

        return view('dashboard.admins.index', compact('Models'));
    }

    public function create()
    {
        return view('dashboard.admins.create');
    }

    public function store(StoreModelRequest $request)
    {
        $Model = Model::create($request->only(['name', 'email', 'phone']));
        $Model->password = bcrypt($request->password);
        if ($request->hasFile('image')) {
            $Model->image = Upload::UploadFile($request->image, 'Admins');
        }
        $Model->save();
        $Model->assignRole([1]);
        alert()->success(__('addedSuccessfully'));

        return redirect()->back();
    }

    public function show($id)
    {
        $Model = Model::where('id', $id)->firstorfail();

        return view('dashboard.admins.show', compact('Model'));
    }

    public function edit($id)
    {
        $Model = Model::where('id', $id)->firstorfail();

        return view('dashboard.admins.edit', compact('Model'));
    }

    public function update(UpdateModelRequest $request, $id)
    {
        $Model = Model::where('id', $id)->firstorfail();
        $Model->update($request->only(['name', 'email', 'phone']));
        if ($request->hasFile('image')) {
            $Model->image = Upload::UploadFile($request->image, 'Admins');
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
