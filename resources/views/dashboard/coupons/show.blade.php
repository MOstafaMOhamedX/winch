@extends('dashboard.layout')
@section('pagetitle', __('drivers'))
@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h2 class="mt-5 ">{{  __('code') .' :'.$Model['code'] }}</h2>
            <h2 class="mt-5 ">{{  __('type') .' :'.$Model['type'] }}</h2>
            <h2 class="mt-5 ">{{  __('discount') .' :'.$Model['discount'] }}</h2>
            <h2 class="mt-5 ">{{  __('percent_off') .' :'.$Model['percent_off'] }}</h2>
            <h2 class="mt-5 ">{{  __('from') .' :'.$Model['from'] }}</h2>
            <h2 class="mt-5 ">{{  __('to') .' :'.$Model['to'] }}</h2>
        </div>
    </div>
</div>
@endsection
