@extends('dashboard.layout')

@section('pagetitle', __('Roles'))
@section('content')

@if ($message = Session::get('success'))

<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>

@endif

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
                <a style="color: #000;" href="{{ route('admin.roles.show',$Model) }}"><i class="fas fa-eye"></i></a>
                <a style="color: #000;" href="{{ route('admin.roles.edit',$Model) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                <form class="formDelete" method="POST" action="{{ route('admin.roles.destroy',$Model) }}">
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
