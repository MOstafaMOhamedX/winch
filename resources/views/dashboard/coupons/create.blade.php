@extends('dashboard.layout')
@section('pagetitle',__('coupons'))
@section('content')
<form method="POST" action="{{ route('admin.coupons.store') }}" enctype="multipart/form-data" data-parsley-validate novalidate>
    @csrf
    <div class="row">
        <div class="col-md-6">
            <label for="code">@lang('code')</label>
            <input id="code" type="text" name="code" required placeholder="@lang('code')" class="form-control">
        </div>
        <div class="col-md-6">
            <label for="type">@lang('type')</label>
            <select id="type" name="type" class="form-control">
                <option selected disabled hidden value="">---</option>
                <option id="show_discount" value="discount">@lang('fixedprice')</option>
                <option id="show_percent_off" value="percent_off">@lang('Discount Percentage')
                </option>
            </select>
        </div>

        <div id="discount" class="col-md-6 d-none">
            <label for="discount">@lang('discount')</label>
            <input type="number" name="discount" placeholder="@lang('discount')" class="form-control" disabled>
        </div>
        <div id="percent_off" class="col-md-6 d-none">
            <label for="percent_off">@lang('Discount Percentage')</label>
            <input type="number" name="percent_off" placeholder="@lang('Discount Percentage')" class="form-control" disabled>
        </div>
        <div class="col-md-6">
            <label for="from">@lang('from')</label>
            <input id="from" type="date" name="from" required placeholder="@lang('from')" class="form-control">
        </div>
        <div class="col-md-6">
            <label for="to">@lang('to')</label>
            <input id="to" type="date" name="to" required placeholder="@lang('to')" class="form-control">
        </div>

        <div class="form-group col-md-6">
            <label for="visibility">@lang('visibility')</label>
            <select class="form-control" required id="visibility" name="status">
                <option selected value="1">@lang('visible')</option>
                <option value="0">@lang('hidden')</option>
            </select>
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

@section('js')
<script>
    $("#type").change(function() {
        if ($(this).val() == 'percent_off') {
            $('#percent_off').removeClass('d-none');
            $('#percent_off input').prop('disabled', false);
        } else {
            $('#percent_off').addClass('d-none');
            $('#percent_off input').prop('disabled', true);
        }
        if ($(this).val() == 'discount') {
            $('#discount').removeClass('d-none');
            $('#discount input').prop('disabled', false);
        } else {
            $('#discount').addClass('d-none');
            $('#discount input').prop('disabled', true);
        }
    });
</script>
@endsection
