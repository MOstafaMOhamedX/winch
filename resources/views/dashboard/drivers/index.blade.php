@extends('dashboard.layout')

@section('pagetitle', __('drivers'))
@section('content')

<div class="row">
    <div class="my-2 col-6 text-sm-start">
        <a href="{{ route('admin.drivers.create') }}" class="btn btn-primary" disabled>@lang('add_new')</a>
    </div>
    <div class="my-2 col-6 text-sm-end">
        <button type="button" id="DeleteSelected" onclick="DeleteSelected('drivers')" class="btn btn-danger" disabled>@lang('Delete_Selected')</button>
    </div>
</div>
<table class="table table-sm table-nowrap table-hover card-table text-center DataTable">
    <thead>
        <tr>
            <th>#</th>
            <th><input type="checkbox" id="ToggleSelectAll" class="btn btn-primary"></th>
            <th>@lang('Name')</th>
            <th>@lang('Email')</th>
            <th>@lang('Phone')</th>
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
                {{ $Model->name }}
            </td>
            <td>
                {{ $Model->email }}
            </td>
            <td>
                {{ $Model->phone }}
            </td>
            <td>
                <a style="color: #000;" href="{{ route('admin.drivers.show', $Model) }}"><i class="fas fa-eye"></i></a>
                <a style="color: #000;" href="{{ route('admin.drivers.edit', $Model) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                <form class="formDelete" method="POST" action="{{ route('admin.drivers.destroy', $Model) }}">
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
