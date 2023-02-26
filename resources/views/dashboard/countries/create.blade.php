@extends('dashboard.layout')
@section('pagetitle', __('Countries'))
@section('content')
<form method="POST" action="{{ route('admin.countries.store') }}" enctype="multipart/form-data" data-parsley-validate novalidate>
    @csrf
    <div class="row">
        <div class="form-group col-md-6">
            <label for="title_ar">@lang('title_ar')</label>
            <input type="text" name="title_ar" id="title_ar" class="form-control" required>
        </div>
        <div class="form-group col-md-6">
            <label for="title_en">@lang('title_en')</label>
            <input type="text" name="title_en" id="title_en" class="form-control" required>
        </div>
        <div class="form-group col-md-6">
            <label for="country_code">@lang('country_code')</label>
            <input type="text" name="country_code" id="country_code" class="form-control" required>
        </div>
        <div class="form-group col-md-6">
            <label for="phone_code">@lang('phone_code')</label>
            <input type="text" name="phone_code" id="phone_code" class="form-control" required>
        </div>
        <div class="form-group col-md-6">
            <label for="currancy_code">@lang('currancy_code')</label>
            <input type="text" name="currancy_code" id="currancy_code" class="form-control" required>
        </div>
        <div class="form-group col-md-6">
            <label for="currancy_value">@lang('currancy_value')</label>
            <input type="text" name="currancy_value" id="currancy_value" class="form-control" required>
        </div>
        <div class="form-group col-md-6">
            <label for="phone_length">@lang('phone_length')</label>
            <input type="text" name="length" id="phone_length" class="form-control" required>
        </div>
        <div class="form-group col-md-6">
            <label for="visibility">@lang('visibility')</label>
            <select class="form-control" required id="visibility" name="status">
                <option selected value="1">@lang('visible')</option>
                <option value="0">@lang('hidden')</option>
            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="accept_orders">@lang('accept_orders')</label>
            <select class="form-control " required id="accept_orders" name="status">
                <option  value="1">@lang('yes')</option>
                <option  value="0">@lang('no')</option>
            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="file">@lang("dashboard.image")</label>
            <label for="file" class="file-input btn btn-block btn-primary btn-file w-100">
                @lang("Browse")
                <input accept="image/*" type="file" type="file" name="image" id="file">
            </label>
        </div>
        <div class="clearfix"></div>
        <div class="col-12 my-4">
            <div class="button-group">
                <button type="submit" class="main-btn primary-btn btn-hover w-100 text-center">
                    {{ __('Submit') }}
                </button>
            </div>
        </div>
    </div>
</form>
@endsection
