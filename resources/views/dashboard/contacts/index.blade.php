@extends('dashboard.layout')
@section('pagetitle', __('contact'))
@section('content')

<div class="my-2 text-sm-end">
    <button type="button" id="DeleteSelected" onclick="DeleteSelected('contacts')" class="btn btn-danger" disabled>@lang('Delete_Selected')</button>
</div>
<table class="table table-bordered data-table DataTable">
    <thead>
        <tr>
            <th>#</th>
            <th><input type="checkbox" id="ToggleSelectAll" class="btn btn-primary"></th>
            <th>@lang('name')</th>
            <th>@lang('phone')</th>
            <th>@lang('email')</th>
            <th>@lang('subject')</th>
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
                {{ $Model->phone }}
            </td>
            <td>
                {{ $Model->email }}
            </td>
            <td>
                {{ $Model->subject }}
            </td>
            <td>
                <a style="color: #000;" href="{{ route('admin.contacts.show', $Model) }}"><i class="fas fa-eye"></i></a>
                <a style="color: #000;" href="{{ route('admin.contacts.edit', $Model) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                <form class="formDelete" method="POST" action="{{ route('admin.contacts.destroy', $Model) }}">
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


