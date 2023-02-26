@extends('dashboard.layout')
@section('pagetitle', __('coupons'))
@section('content')

<div class="row">
    <div class="my-2 col-6 text-sm-start">
        <a href="{{ route('admin.coupons.create') }}" class="btn btn-primary" disabled>@lang('add_new')</a>
    </div>
    <div class="my-2 col-6 text-sm-end">
        <button type="button" id="DeleteSelected" onclick="DeleteSelected('coupons')" class="btn btn-danger" disabled>@lang('Delete_Selected')</button>
    </div>
</div>
<table class="table DataTable" >
    <thead>
        <tr>
            <th>#</th>
            <th><input type="checkbox" id="ToggleSelectAll" class="btn btn-primary"></th>
            <th>@lang('code')</th>
            <th>@lang('type')</th>
            <th>@lang('Discount')</th>
            <th>@lang('from')</th>
            <th>@lang('to')</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($Models as $Model)
        <tr>
            <td>
                {{ $loop->iteration }}
            </td>
            <td>
                <input type="checkbox" class="DTcheckbox" value="{{ $Model->id }}">
            </td>
            <td>
                {{ $Model->code }}
            </td>
            <td>
                {{ $Model->type }}
            </td>
            <td>
                {{ $Model->discount ? $Model->discount . ' BHD' :  $Model->percent_off . ' %' }}
            </td>
            <td>
                {{ $Model->from }}
            </td>
            <td>
                {{ $Model->to }}
            </td>
            <td>
                <a style="color: #000;" href="{{ route('admin.coupons.show', $Model) }}"><i class="fas fa-eye"></i></a>
                <a style="color: #000;" href="{{ route('admin.coupons.edit', $Model) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                <form class="formDelete" method="POST" action="{{ route('admin.coupons.destroy', $Model) }}">
                    @csrf
                    <input name="_method" type="hidden" value="DELETE">
                    <button type="button" class="btn btn-flat show_confirm" data-toggle="tooltip" title="Delete"><i class="fa-solid fa-eraser"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection


