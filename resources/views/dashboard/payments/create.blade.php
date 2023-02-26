@extends('dashboard.layout')
@section('pagetitle', __('paymentMethods'))
@section('content')
<form method="POST" action="{{ route('admin.payments.store') }}" enctype="multipart/form-data" data-parsley-validate novalidate>
    @csrf
    <div class="row">
        <div class="col-md-6">
            <label for="title_ar">@lang('title_ar')</label>
            <input type="text" name="title_ar" id="title_ar" class="form-control" required data-buttonname="btn-primary">
        </div>
        <div class="col-md-6">
            <label for="title_en">@lang('title_en')</label>
            <input type="text" name="title_en" id="title_en" class="form-control" required data-buttonname="btn-primary">
        </div>

        <div class="col-md-6">
            <label for="visibility">@lang('visibility')</label>
            <select class="form-control" required id="visibility" name="status">
                <option selected value="1">@lang('visible')</option>
                <option value="0">@lang('hidden')</option>
            </select>
        </div>

        <div class="form-group col-md-6">
            <label for="image">@lang('image')</label>
            <label for="image" class="file-input btn btn-block btn-primary btn-file w-100">
                @lang("Browse")
                <input accept="image/*" type="file" type="file" name="image[]" multiple id="image" required>
            </label>
        </div>
        <div class="clearfix"></div>
        <div class="row mx-auto">
            <div class="col-sm-12 my-4">
                <div class="text-center p-20 ">
                    <button type="submit" class="btn btn-primary">{{ __('add') }}</button>
                    <button type="reset" class="btn btn-secondary">{{ __('cancel') }}</button>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection
