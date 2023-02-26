<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:roles-list', ['only' => ['index', 'store']]);
        $this->middleware('permission:roles-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:roles-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:roles-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $Models = role::latest()->get();

        return view('dashboard.roles.index', compact('Models'));
    }

    public function create()
    {
        $permissions = Permission::get();

        return view('dashboard.roles.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title_ar' => 'required',
            'title_en' => 'required',
            'rolePermissions' => 'sometimes|required',
        ]);

        $role = Role::create([
            'name' => $request->input('title_en'),
            'title_ar' => $request->input('title_ar'),
            'title_en' => $request->input('title_en'),
        ]);
        if ($request->input('permissions') && count($request->input('permissions'))) {
            $role->syncPermissions($request->input('permissions'));
        }
        alert()->success(__('addedSuccessfully'));

        return redirect()->back();
    }

    public function show($id)
    {
        $role = Role::find($id);
        $rolePermissions = Permission::join('role_has_permissions', 'role_has_permissions.permission_id', '=', 'permissions.id')->where('role_has_permissions.role_id', $id)->get();

        return view('dashboard.roles.show', compact('role', 'rolePermissions'));
    }

    public function edit($id)
    {
        $role = Role::find($id);
        $permissions = Permission::get();
        $rolePermissions = DB::table('role_has_permissions')->where('role_has_permissions.role_id', $id)->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')->all();

        return view('dashboard.roles.edit', compact('role', 'permissions', 'rolePermissions'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title_ar' => 'required',
            'title_en' => 'required',
            'permissions' => 'sometimes|required',
        ]);
        Role::find($id)->update([
            'name' => $request->title_en,
            'title_ar' => $request->title_ar,
            'title_en' => $request->title_en,
        ]);
        $role = Role::find($id);
        $role->syncPermissions($request->input('permissions'));

        alert()->success(__('updatedSuccessfully'));

        return redirect()->back();
    }

    public function destroy($id)
    {
        if ($id > 1) {
            Role::find($id)->delete();
            alert()->success(__('DeletedSuccessfully'));
        } else {
            alert()->error(__('errorProcess'));
        }

        return redirect()->back();
    }
}
