@extends('Admin.layout')

@section('content')
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title mb-30">
                    <h2>{{ __('messages.My Profile') }}</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="card-styles">
        <div class="card-content">
            <form action="{{ route('admin.profile.update') }}" method="POST" accept-charset="UTF-8" id="signUP">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-12">
                        <div class="input-style-1">
                            <label for="name">{{ __('messages.user_name') }}</label>
                            <input type="text" @error('name') class="form-control is-invalid" @enderror name="name" id="name" placeholder="{{ __('messages.user_name') }}" value="{{ old('name', auth()->user()->name) }}" required>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="input-style-1">
                            <label for="email">{{ __('messages.Email') }}</label>
                            <input @error('email') class="form-control is-invalid" @enderror type="email" name="email" id="email" placeholder="{{ __('messages.Email') }}" value="{{ old('email', auth()->user()->email) }}" required>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="input-style-1">
                            <label for="password">{{ __('website.New') . ' ' . __('messages.password')}}</label>
                            <input type="password" @error('password') class="form-control is-invalid" @enderror name="password" id="password" placeholder="{{ __('website.New') . ' ' . __('messages.password')}}">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="input-style-1">
                            <label for="password_confirmation">{{ __('website.New') . ' ' . __('website.confirmPassword')}}</label>
                            <input type="password" @error('password') class="form-control is-invalid" @enderror name="password_confirmation" id="password_confirmation" placeholder="{{ __('website.New') . ' ' . __('website.confirmPassword')}}">
                        </div>
                    </div>



                    <div class="col-12">
                        <div class="button-group d-flex justify-content-center flex-wrap">
                            <button type="submit" class="main-btn primary-btn btn-hover w-100 text-center" id="submitform">
                                {{ __('messages.Submit') }}
                            </button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>


    <div class="modal" id="Verify_phone_number" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document" style="padding-top: 10%;">
            <div class="modal-content w-100">
                <div class="modal-header">
                    <h5 class="modal-title">@lang('messages.Verify_phone_number')</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group mt-4" >
                        <div id="digitsContainer">
                            <form id="codeverifyForm">
                                <div id="inputs" class="ltr">
                                    <input type="text" class="digit" id="verificationCodeDigit1" minlength="1" maxlength="1" required>
                                    <input type="text" class="digit" id="verificationCodeDigit2" minlength="1" maxlength="1" required>
                                    <input type="text" class="digit" id="verificationCodeDigit3" minlength="1" maxlength="1" required>
                                    <input type="text" class="digit" id="verificationCodeDigit4" minlength="1" maxlength="1" required>
                                    <input type="text" class="digit" id="verificationCodeDigit5" minlength="1" maxlength="1" required>
                                    <input type="text" class="digit" id="verificationCodeDigit6" minlength="1" maxlength="1" required>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn px-2 py-1 btn-primary" id="verifPhNum">@lang('website.send')</button>
                    <button type="button" class="btn px-2 py-1 btn-secondary" data-dismiss="modal" id="Close">@lang('website.close')</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('css')
    <style>
        .dropdown-toggle::after {
            display: none !important;
        }
        @media (max-width: 500px) {
            input#phone_number {
                width: 61% !important;
            }
        }
    </style>
@endsection
