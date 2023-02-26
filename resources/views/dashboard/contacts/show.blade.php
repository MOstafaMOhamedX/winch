@extends('dashboard.layout')
@section('pagetitle', __('contact'))
@section('content')
    <div class="row">
        <div class="col-2">
            @lang('name')
        </div>
        <div class="col-10">
            {{ $Contact['name'] }}
        </div>

        <div class="col-2">
            @lang('phone')
        </div>
        <div class="col-10">
            {{ $Contact['phone'] }}
        </div>

        <div class="col-2">
            @lang('email')
        </div>
        <div class="col-10">
            {{ $Contact['email'] }}
        </div>

        <div class="col-2">
            @lang('subject')
        </div>
        <div class="col-10">
            {{ $Contact['subject'] }}
        </div>

        <div class="col-2">
            @lang('message')
        </div>
        <div class="col-10">
            <p> {{ $Contact['message'] }}</p>
        </div>
    </div>

@endsection
