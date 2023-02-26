@extends('dashboard.layout')

@section('pagetitle', __('countries'))
@section('content')

<div class="row">
    <div class="my-2 col-6 text-sm-start">
        <a href="{{ route('admin.countries.create') }}" class="btn btn-primary" disabled>@lang('add_new')</a>
    </div>
    <div class="my-2 col-6 text-sm-end">
        <button type="button" id="DeleteSelected" onclick="DeleteSelected('countries')" class="btn btn-danger" disabled>@lang('Delete_Selected')</button>
    </div>
</div>
<table class="table table-sm table-nowrap table-hover card-table text-center DataTable">
    <thead>
        <tr>
            <th>#</th>
            <th><input type="checkbox" id="ToggleSelectAll" class="btn btn-primary"></th>
            <th style="text-align:center;">@lang('title_ar')</th>
            <th style="text-align:center;">@lang('title_en')</th>
            <th style="text-align:center;">@lang('country_code')</th>
            <th style="text-align:center;">@lang('phone_code')</th>
            <th style="text-align:center;">@lang('currancy_code')</th>
            <th style="text-align:center;">@lang('currancy_value')</th>
            <th style="text-align:center;">@lang('image')</th>
            <th style="text-align:center;">@lang('visibility')</th>
            <th style="text-align:center;">@lang('regions')</th>
            <th style="text-align:center;"></th>
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
                {{ $Model->title_ar }}
            </td>
            <td>
                {{ $Model->title_en }}
            </td>
            <td>
                {{ $Model->country_code }}
            </td>
            <td>
                {{ $Model->phone_code }}
            </td>
            <td>
                {{ $Model->currancy_code }}
            </td>
            <td>
                {{ $Model->currancy_value }}
            </td>
            <td>
                <img src="{{ $Model->image }}" alt="{{ $Model->image }}" srcset="{{ $Model->image }}" style="height: 50px;width: 70%;">
            </td>
            <td>
                <label data-id="{{ $Model->id }}" onclick="toggleswitch({{ $Model->id }},'countries')" class="switch toggleswitch bg-dark"><input id="checkbox{{ $Model->id }}" type="checkbox" @if($Model->status) checked @endif><span class="slider"></span></label>
            </td>
            <td>
                <a href="{{ route('admin.country.regions.index',['country'=>$Model->id ]) }}">{{ __('regions') }}</a>
            </td>
            <td>
                <a style="color: #000;" href="{{ route('admin.countries.show', $Model) }}"><i class="fas fa-eye"></i></a>
                <a style="color: #000;" href="{{ route('admin.countries.edit', $Model) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                <form class="formDelete" method="POST" action="{{ route('admin.countries.destroy', $Model) }}">
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
