<?php

namespace App\Http\Controllers\Dashboard;

use App\Functions\Upload;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:settings-list', ['only' => ['index', 'store']]);
        $this->middleware('permission:settings-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:settings-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:settings-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        return $this->show(null);
    }

    public function show()
    {
        $type = request()->type ?? null;
        $Settings = Setting::when($type, function ($query, $type) {
            return $query->where('type', $type);
        })->get();

        return view('dashboard.settings.edit', compact('Settings', 'type'));
    }

    public function create()
    {
        return view('dashboard.settings.create');
    }

    public function store(Request $request)
    {
        if ($request['valuetype'] == 'description') {
            Setting::create($request->only('key', 'type', 'value'));
        }
        if ($request['valuetype'] == 'image') {
            $imageName = Upload::UploadFile($request->file('Imagevalue'), 'settings');
            Setting::create($request->only('key', 'type') + ['value' => $imageName]);
        }
        alert()->success(__('addedSuccessfully'));

        return redirect()->back();
    }

    public function update($id, Request $request)
    {
        if ($request->type) {
            $settings = Setting::latest()->where('type', $request->type)->get();
        } else {
            $settings = Setting::get();
        }

        foreach ($settings as $setting) {
            if (str_contains($setting['key'], '_image') || str_contains($setting['key'], 'logo') || str_contains($setting['key'], 'watermark')) {
                if ($request->hasFile($setting['key'])) {
                    Upload::deleteImage($setting['value'], 'settings');
                    Setting::latest()->where('key', $setting['key'])->update(['value' => Upload::UploadFile($request[$setting['key']], 'settings')]);
                }
            } else {
                Setting::latest()->where('key', $setting['key'])->update(['value' => $request->get($setting['key'])]);
            }
        }
        alert()->success(__('updatedSuccessfully'));
        session()->forget('Settings');

        return redirect()->back();
    }

    public function destroy(Setting $setting)
    {
        $setting->delete();
        alert()->success(__('DeletedSuccessfully'));

        return redirect()->back();
    }
}
