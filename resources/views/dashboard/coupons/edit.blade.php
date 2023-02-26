@extends('dashboard.layout')
@section('pagetitle',__('coupons'))
@section('content')
<form method="POST" action="{{ route('admin.coupons.update',$Coupon) }}" enctype="multipart/form-data" data-parsley-validate novalidate>
    @method('PUT')
    @csrf
    <div class="row">
        <div class="col-md-6">
            <label for="code">@lang('code')</label>
            <input id="code" type="text" name="code" value="{{ $Coupon['code'] }}" required placeholder="@lang('code')" class="form-control">
        </div>
        <div class="col-md-6">
            <label for="type">@lang('type')</label>
            <select id="type" name="type" class="form-control">
                <option selected disabled hidden value="">---</option>
                <option {{ $Coupon['type'] == 'discount' ? 'selected' : '' }} id="show_discount" value="discount">@lang('fixedprice')</option>
                <option {{ $Coupon['type'] == 'percent_off' ? 'selected' : '' }} id="show_percent_off" value="percent_off">@lang('Discount Percentage')</option>
            </select>
        </div>

        <div id="discount" class="col-md-6 {{ $Coupon['discount'] ? '' : 'd-none' }}">
            <label for="discount">@lang('discount')</label>
            <input type="number" name="discount" value="{{ $Coupon['discount'] }}" placeholder="@lang('discount')" class="form-control">
        </div>
        <div id="percent_off" class="col-md-6 {{ $Coupon['percent_off'] ? '' : 'd-none' }}">
            <label for="percent_off">@lang('Discount Percentage')</label>
            <input type="number" name="percent_off" value="{{ $Coupon['percent_off'] }}" placeholder="@lang('Discount Percentage')" class="form-control" disabled>
        </div>
        <div class="col-md-6">
            <label for="from">@lang('from')</label>
            <input id="from" type="date" name="from" value="{{ $Coupon['from'] }}" required placeholder="@lang('from')" class="form-control">
        </div>
        <div class="col-md-6">
            <label for="to">@lang('to')</label>
            <input id="to" type="date" name="to" value="{{ $Coupon['to'] }}" required placeholder="@lang('to')" class="form-control">
        </div>

        <div class="form-group col-md-6">
            <label for="visibility">@lang('visibility')</label>
            <select class="form-control" required id="visibility" name="status">
                <option {{ $Coupon['status'] == 1 ? 'selected' : '' }} value="1">@lang('visible')</option>
                <option {{ $Coupon['status'] == 0 ? 'selected' : '' }} value="0">@lang('hidden')</option>
            </select>
        </div>
        <div class="col-md-6">
            <label for="coupon_id">@lang('same_as')</label>
            <select id="coupon_id" name="coupon_id" class="form-control">
                <option selected disabled hidden value="">---</option>
                <option value="0">@lang('all')</option>
                @foreach($Coupons as $item)
                    <option value="{{ $item->id }}">{{ $item->code }}</option>
                @endforeach
            </select>
        </div>
        @php($products_ids = $Coupon->Products()->pluck('product_id')->toarray())
        <div class="col-md-12 my-4">
            @foreach($products as $product)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" {{ in_array($product->id, $products_ids) ? 'checked' : '' }} value="{{ $product->id }}" name="products_ids[]" id="product-{{ $product->id }}">
                    <label class="form-check-label" for="products">
                        {{ $product->title() }}
                    </label>
                </div>
            @endforeach
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
    $(document).on("change", "#coupon_id", function () {
        $('input:checkbox').prop('checked', false);
        $.ajax({
            type:'POST',
            url:'/dashboard/coupon_products/'+$('#coupon_id option:selected').val(),
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
            },
            success:function(data){
                $(data).each(function( index , product_id ) {
                    $('#product-'+product_id).prop( "checked", true );
                });
            },
            error: function (xhr, exception) {
                var msg = "";
                if (xhr.status === 0) {
                    msg = "Not connect.\n Verify Network." + xhr.responseText;
                } else if (xhr.status == 404) {
                    msg = "Requested page not found. [404]" + xhr.responseText;
                } else if (xhr.status == 500) {
                    msg = "Internal Server Error [500]." +  xhr.responseText;
                } else if (exception === "parsererror") {
                    msg = "Requested JSON parse failed.";
                } else if (exception === "timeout") {
                    msg = "Time out error." + xhr.responseText;
                } else if (exception === "abort") {
                    msg = "Ajax request aborted.";
                } else {
                    msg = "Error:" + xhr.status + " " + xhr.responseText;
                }
               console.log(msg);
            }
        });
    });
</script>
@endsection
