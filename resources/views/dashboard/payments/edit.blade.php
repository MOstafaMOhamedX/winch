@extends('dashboard.layout')
@section('pagetitle', __('paymentMethods'))
@section('content')
    <form method="POST" action="{{ route('admin.payments.update',$PaymentMethod) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col text-center">
                @foreach ($PaymentMethod->Images as $item)
                    <img width="200px" src="{{ asset($item['image']) }}" alt="item" class="changeimage">
                @endforeach
            </div>
        </div>
        <div class="row">
            <div class=" col-md-6">
                <label for="title_ar">@lang('title_ar')</label>
                <input id="title_ar" type="text" name="title_ar" required placeholder="@lang('title_ar')"
                    class="form-control" value="{{ $PaymentMethod['title_ar'] }}">
            </div>
            <div class=" col-md-6">
                <label for="title_en">@lang('title_en')</label>
                <input id="title_en" type="text" name="title_en" required placeholder="@lang('title_en')"
                    class="form-control" value="{{ $PaymentMethod['title_en'] }}">
            </div>
            <div class=" col-md-6">
                <label for="visibility">@lang('visibility')</label>
                <select class="form-control" required id="visibility" name="status">
                    <option {{ $PaymentMethod['status'] == 0 ? 'selected' : '' }} value="0">@lang('hidden')</option>
                    <option {{ $PaymentMethod['status'] == 1 ? 'selected' : '' }} value="1">@lang('visible')</option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="image">@lang('image')</label>
                <label for="image" class="file-input btn btn-block btn-primary btn-file w-100">
                    @lang("Browse")
                    <input accept="image/*" type="file" type="file" name="image[]" id="image" >
                </label>
            </div>


            <div class="clearfix"></div>
            <div class="col-12 my-3">
                <div class="button-group">
                    <button type="submit" class="main-btn primary-btn btn-hover w-100 text-center">
                        {{ __('Submit') }}
                    </button>
                </div>
            </div>
        </div>
    </form>
@endsection
