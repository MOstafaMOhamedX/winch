@extends('dashboard.layout')
@section('pagetitle', __('permissions'))
@section('content')


{!! Form::open(array('route' => ['admin.permissions.store'],'method'=>'POST')) !!}

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-6">
        <div class="form-group">
            <strong>{{ __('Name') }}:</strong>
            {!! Form::text('name', null, array('placeholder' => __('Name'),'class' => 'form-control')) !!}
        </div>
    </div>
    {{--  <div class="col-xs-12 col-sm-12 col-md-6">
        <div class="form-group">
            <strong>{{  __('title_ar') }}:</strong>
            {!! Form::text('title_ar', null, array('placeholder' => __('title_ar'),'class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-6">
        <div class="form-group">
            <strong>{{  __('title_en') }}:</strong>
            {!! Form::text('title_en', null, array('placeholder' =>__('title_en') ,'class' => 'form-control')) !!}
        </div>
    </div>  --}}

    <div class="col-xs-12 col-sm-12 col-md-12 text-center my-3">
        <button type="submit" class="btn btn-primary">@lang('Submit')</button>
    </div>
</div>

{!! Form::close() !!}

<p class="text-center text-primary"><small></small></p>

@endsection
