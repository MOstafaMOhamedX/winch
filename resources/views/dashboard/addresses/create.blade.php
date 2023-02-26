@extends('dashboard.layout')
@section('pagetitle',__('addresses'))
@section('content')
<form method="POST" action="{{ route('admin.client.addresses.store', $Client) }}">
    @csrf
    <div class="row">
        <input type="hidden" name="client_id" value="{{$Client->id}}">
        <div class="col-md-6 my-2">
            <label for="">@lang('client')</label>
            <input type="text" readonly value="{{$Client->name}}" class="form-control">
        </div>
        <div class="col-md-6 my-2">
            <label for="region_id">@lang('region')</label>
            <select name="region_id" class="form-control">
                <option selected hidden>@lang('Select')</option>
                @foreach($regions as $key => $item)
                    <option value="{{$item->id}}">
                        {{$item->title()}}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6 my-2">
            <label for="lat">@lang('lat')</label>
            <input id="lat" type="text" name="lat" required placeholder="@lang('lat')" class="form-control">
        </div>
        <div class="col-md-6 my-2">
            <label for="long">@lang('long')</label>
            <input id="long" type="text" name="long" required placeholder="@lang('long')" class="form-control">
        </div>
        <div class="col-md-6 my-2">
            <label for="block">@lang('block')</label>
            <input id="block" type="text" name="block" required placeholder="@lang('block')" class="form-control">
        </div>
        <div class="col-md-6 my-2">
            <label for="road">@lang('road')</label>
            <input id="road" type="text" name="road" required placeholder="@lang('road')" class="form-control">
        </div>
        <div class="col-md-6 my-2">
            <label for="building_no">@lang('Building')</label>
            <input id="building_no" type="text" name="building_no" required placeholder="@lang('Building')" class="form-control">
        </div>
        <div class="col-md-6 my-2">
            <label for="floor_no">@lang('floorNo')</label>
            <input id="floor_no" type="text" name="floor_no" required placeholder="@lang('floorNo')" class="form-control">
        </div>
        <div class="col-md-6 my-2">
            <label for="apartment">@lang('apartment')</label>
            <input id="apartment" type="text" name="apartment" required placeholder="@lang('apartment')" class="form-control">
        </div>
        <div class="col-md-6 my-2">
            <label for="type">@lang('type')</label>
            <select name="type" class="form-control">
                <option selected hidden>@lang('Select')</option>
                <option value="flat">@lang('flat')</option>
                <option value="office">@lang('office')</option>
            </select>
        </div>
        <div class="col-md-6 my-2">
            <label for="note">@lang('note')</label>
            <textarea id="note" type="text" name="note" required placeholder="@lang('note')" class="form-control mceNoEditor"></textarea>
        </div>

        <div class="clearfix"></div>
        <div class="form-group col-12 m-b-0 text-center mx-auto mt-2">
            <button class="btn btn-primary waves-effect waves-light" type="submit">@lang('add')</button>
            <button type="reset" class="btn btn-default waves-effect waves-light m-l-5">@lang('cancel')</button>
        </div>
    </div>
</form>
@endsection
