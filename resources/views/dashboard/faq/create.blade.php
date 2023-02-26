@extends('dashboard.layout')
@section('pagetitle', __('FAQ'))
@section('content')
    <form method="POST" action="{{ route('admin.faq.store') }}" data-parsley-validate novalidate>
        @csrf
        <div class="row">
            <div class="col-md-6">
                <label for="question_ar">@lang('question_ar')</label>
                <input id="question_ar" type="text" name="question_ar" required placeholder="@lang('question_ar')"
                    class="form-control">
            </div>
            <div class="col-md-6">
                <label for="question_en">@lang('question_en')</label>
                <input id="question_en" type="text" name="question_en" required placeholder="@lang('question_en')"
                    class="form-control">
            </div>
            <div class="col-md-6">
                <label for="answer_ar">@lang('answer_ar')</label>
                <textarea id="answer_ar" name="answer_ar" required placeholder="@lang('answer_ar')"
                    class="form-control"></textarea>
            </div>
            <div class="col-md-6">
                <label for="answer_en">@lang('answer_en')</label>
                <textarea id="answer_en" name="answer_en" required placeholder="@lang('answer_en')"
                    class="form-control"></textarea>
            </div>
            <div class="col-md-6">
                <label for="visibility">@lang('visibility')</label>
                <select class="form-control" required id="visibility" name="status">
                    <option value="0">@lang('hidden')</option>
                    <option selected value="1">@lang('visible')</option>
                </select>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-sm-12 my-4">
                    <div class="text-center p-20">
                        <button type="submit" class="btn btn-primary">{{ __('add') }}</button>
                        <button type="reset" class="btn btn-secondary">{{ __('cancel') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

