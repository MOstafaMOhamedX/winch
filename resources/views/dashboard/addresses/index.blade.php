@extends('dashboard.layout')
@section('pagetitle',__('addresses'))
@section('content')

<div class="row">
    <div class="my-2 col-6 text-sm-start">
        <a href="{{ route('admin.client.addresses.create', $Client) }}" class="btn btn-primary" disabled>@lang('add_new')</a>
    </div>
    <div class="my-2 col-6 text-sm-end">
        <button type="button" id="DeleteSelected" onclick="DeleteSelected('addresses')" class="btn btn-danger" disabled>@lang('Delete_Selected')</button>
    </div>
</div>
<table class="table DataTable">
    <thead>
        <tr>
            <th><input type="checkbox" id="ToggleSelectAll" class="btn btn-primary"></th>
            <th>#</th>
            <th style="text-align:center;">@lang('client')</th>
            <th style="text-align:center;">@lang('region')</th>
            <th style="text-align:center;">@lang('email')</th>
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
                {{ $Model->Client->name }}
            </td>
            <td>
                {{ $Model->Region->title() }}
            </td>
            <td>
                {{ $Model->Client->email }}
            </td>
            <td>
                <a style="color: #000;" href="{{ route('admin.client.addresses.show',['client'=>request()->client,'address'=> $Model]) }}"><i class="fas fa-eye"></i></a>
                <a style="color: #000;" href="{{ route('admin.client.addresses.edit',['client'=>request()->client,'address'=> $Model]) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                <form class="formDelete" method="POST" action="{{ route('admin.client.addresses.destroy',['client'=>request()->client,'address'=> $Model]) }}">
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

