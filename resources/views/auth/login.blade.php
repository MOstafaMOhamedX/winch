<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">

    <link rel="shortcut icon" href="{{ asset('login_assets/assets_' .lang() . '/images/favicon_1.ico') }}">

    <title>@lang('dashboardTitle')</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Changa:wght@400;700&display=swap" rel="stylesheet">

    <style>
        * {
            font-family: 'Changa', sans-serif;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: 'Changa', sans-serif !important;
        }

    </style>

    <link href="{{ asset('login_assets/assets_' .lang() . '/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('login_assets/assets_' .lang() . '/css/core.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('login_assets/assets_' .lang() . '/css/components.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('login_assets/assets_' .lang() . '/css/icons.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('login_assets/assets_' .lang() . '/css/pages.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('login_assets/assets_' .lang() . '/css/menu.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('login_assets/assets_' .lang() . '/css/responsive.css') }}" rel="stylesheet" type="text/css" />

</head>

<body @if(app()->isLocale('ar')) dir="rtl" @endif>

    <div class="account-pages"></div>
    <div class="clearfix"></div>
    <div class="wrapper-page">
        <div class=" card-box">
            <div class="panel-heading">
                <h3 class="text-center"> @lang('Login') <strong class="text-custom">@lang('management')</strong> </h3>
            </div>
            <div class="panel-body">
                @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
                @endif
                @if (session()->has('danger'))
                <div class="alert alert-danger">
                    {{ session()->get('danger') }}
                </div>
                @endif
                <form class="form-horizontal m-t-20" action="{{route('admin.login')}}" method="POST">
                    @csrf
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" name="email" required placeholder="@lang('email')">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="password" name="password" required placeholder="@lang('Password')">
                        </div>
                    </div>

                    <div class="form-group ">
                        <div class="col-xs-12">
                            <div class="checkbox checkbox-primary">
                                <input id="checkbox-signup" name="remember" type="checkbox">
                                <label for="checkbox-signup">
                                    @lang('remember')
                                </label>
                            </div>

                        </div>
                    </div>

                    <div class="form-group text-center m-t-40">
                        <div class="col-xs-12">
                            <button class="btn btn-pink btn-block text-uppercase waves-effect waves-light" type="submit" name="submit">@lang('login')</button>
                        </div>
                    </div>
                    <div class="form-group m-t-30 m-b-0">
                        <div class="col-sm-12">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 text-center">
            </div>
        </div>
    </div>

    <footer class="footer text-right">
        <div class="container">
            <div class="row">
                <div class="col-xs-6">
                    @lang('emcancopyright') <a href="https://emcan-group.com/" target="_blank" style="text-decoration: none; color:black;"> Emcan </a>
                </div>

            </div>
        </div>
    </footer>
