@extends('dashboard.layout')

@section('pagetitle', __('paymentMethods'))
@section('content')

<table class="table table-bordered data-table DataTable">
    <thead>
        <tr>
            <th>#</th>
            <th>@lang('title_ar')</th>
            <th>@lang('title_en')</th>
            <th>@lang('image')</th>
            <th>@lang('status')</th>
            <th></th>
        </tr>
    </thead>
    <tbody>

    </tbody>
</table>

@endsection
