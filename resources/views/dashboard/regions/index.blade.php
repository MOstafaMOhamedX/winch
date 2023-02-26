@extends('dashboard.layout')
@section('pagetitle', __('regions'))
@section('content')

<div class="row">
    <div class="my-2 col-6 text-sm-start">
        <a href="{{ route('admin.country.regions.create',request()->country) }}" class="btn btn-primary" disabled>@lang('add_new')</a>
    </div>
    <div class="my-2 col-6 text-sm-end">
        <button type="button" id="DeleteSelected" onclick="DeleteSelected('regions')" class="btn btn-danger" disabled>@lang('Delete_Selected')</button>
    </div>
</div>
<table class="table DataTable">
    <thead>
        <tr>
            <th>#</th>
            <th><input type="checkbox" id="ToggleSelectAll" class="btn btn-primary"></th>
            <th style="text-align:center;">@lang('title_ar')</th>
            <th style="text-align:center;">@lang('title_en')</th>
            <th style="text-align:center;">@lang('visibility')</th>
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
                {{ $Model->title_ar }}
            </td>
            <td>
                {{ $Model->title_en }}
            </td>
            <td>
                <label data-id="{{ $Model->id }}" onclick="toggleswitch({{ $Model->id }},'regions')" class="switch toggleswitch bg-dark"><input id="checkbox{{ $Model->id }}" type="checkbox" @if($Model->status) checked @endif><span class="slider"></span></label>
            </td>
            <td>
                <a style="color: #000;" href="{{ route('admin.country.regions.show',['country'=>request()->country ,'region'=>$Model ]) }}"><i class="fas fa-eye"></i></a>
                <a style="color: #000;" href="{{ route('admin.country.regions.edit',['country'=>request()->country ,'region'=>$Model ]) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                <form class="formDelete" method="POST" action="{{ route('admin.country.regions.destroy',['country'=>request()->country ,'region'=>$Model ]) }}">
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
