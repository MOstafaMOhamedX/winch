<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\StoreFAQRequest as StoreModelRequest;
use App\Http\Requests\Dashboard\UpdateFAQRequest as UpdateModelRequest;
use App\Models\FAQ as Model;
use Illuminate\Http\Request;

class FAQController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:faq-list', ['only' => ['index', 'store']]);
        $this->middleware('permission:faq-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:faq-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:faq-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $Models = Model::latest()->get();

        return view('dashboard.faq.index', compact('Models'));
    }

    public function create()
    {
        return view('dashboard.faq.create');
    }

    public function store(StoreModelRequest $request)
    {
        Model::create($request->validated());

        alert()->success(__('addedSuccessfully'));

        return redirect()->back();
    }

    public function show($id)
    {
        $faq = Model::latest()->findOrFail($id);

        return view('dashboard.faq.show', compact('faq'));
    }

    public function edit($id)
    {
        $FAQ = Model::latest()->findOrFail($id);

        return view('dashboard.faq.edit', compact('FAQ'));
    }

    public function update(UpdateModelRequest $request, $id)
    {
        Model::latest()->findOrFail($id)->update($request->validated());

        alert()->success(__('updatedSuccessfully'));

        return redirect()->back();
    }

    public function destroy($id)
    {
        $faq = Model::latest()->findOrFail($id);
        $faq->delete();
        alert()->success(__('DeletedSuccessfully'));

        return redirect()->back();
    }
}
