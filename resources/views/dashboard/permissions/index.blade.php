@extends('dashboard.layout')
@section('pagetitle', __('permissions'))
@section('content')


<table class="table table-bordered data-table text-center DataTable">
    <thead>
        <tr>
            <th>#</th>
            <th>@lang('title_ar')</th>
            <th>@lang('title_en')</th>
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
                {{ $Model->title_ar }}
            </td>
            <td>
                {{ $Model->title_en }}
            </td>
            <td>
                <a style="color: #000;" href="{{ route('admin.permissions.edit',$Model) }}"><i class="fa-solid fa-pen-to-square"></i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>


@endsection

