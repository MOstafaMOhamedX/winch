<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ setting('title_'.lang()) }}</title>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf_token" value="{{ csrf_token() }}" content="{{ csrf_token() }}"/>
    <link rel="icon" href="{{ asset(setting('logo')) }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/lineicons.css') }}" />
    <link href='https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800;900&display=swap' rel="stylesheet">

    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">

    @yield('css')
    @if (lang('ar'))
        <link href="{{ asset('css/ar.css') }}" rel="stylesheet">
    @else
        <link href="{{ asset('css/en.css') }}" rel="stylesheet">
    @endif

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">

</head>

<body >
    <aside class="sidebar-nav-wrapper active">
        <div class="navbar-logo">
            <a href="{{ route('admin.home') }}">
                <img src="{{ asset(setting('logo')) }}" alt="logo" style="height: 100px" />
            </a>
        </div>
        <nav class="sidebar-nav">
            <ul>
                <li class="nav-item @if(str_contains(Route::currentRouteName(), 'admins')) active @endif">
                    <a class="collapsed" href="#0" class="" data-bs-toggle="collapse" data-bs-target="#admins" aria-controls="admins" aria-expanded="true" aria-label="Toggle navigation">
                        <span class="icon text-center">
                            <i style="width: 20px;" class="fa-solid fa-users-between-lines mx-2"></i>
                        </span>
                        <span class="text">{{ __('messages.admins') }}</span>
                    </a>
                    <ul id="admins" class="dropdown-nav mx-4 collapse" style="">
                        <li><a href="">{{ __('messages.viewAll') }}</a></li>
                        <li><a href="">{{ __('messages.add') }}</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </aside>
    <div class="overlay"></div>

    <main class="main-wrapper active">
        <header class="header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-5 col-md-5 col-6" style="z-index: 100">
                        <div class="header-left">
                            <div class="menu-toggle-btn mr-20">
                                <button id="menu-toggle" class="main-btn primary-btn btn-hover">
                                    <i class="lni lni-menu"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7 col-6">
                        <div class="header-right">
                            <div class="profile-box ml-15">
                                <button class="dropdown-toggle bg-transparent border-0" type="button" id="profile" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="profile-info">
                                        <div class="info">
                                            <h6>{{ Auth::user()?->name }}</h6>
                                        </div>
                                    </div>
                                    <i class="lni lni-chevron-down"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profile">
                                    <li>
                                        <a href="{{ route('admin.profile.show') }}"> <i class="lni lni-user"></i> {{ __('website.myProfile') }}</a>
                                    </li>
                                    <li>
                                        <form method="POST" action="{{ route('admin.logout') }}">
                                            @csrf
                                            <a href="{{ route('admin.logout') }}" onclick="event.preventDefault(); this.closest('form').submit();"> <i class="lni lni-exit"></i> {{ __('website.logout') }}</a>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <section class="section">
            <div class="container-fluid">
                <div class="title-wrapper pt-30">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="title mb-30">
                                <h2>@yield('pagetitle')</h2>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-styles">
                    @yield('content')
                </div>
            </div>
        </section>

        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 order-last order-md-first">
                        <div class="copyright text-md-start">
                            <p class="text-sm">
                                @lang('messages.copyrights')
                                <a href="https://emcan-group.com/" rel="nofollow" target="_blank">
                                    {{ __('messages.emcan') }}
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </main>



    <script src="{{ asset('js/dashboard.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    @yield('js')
</body>
</html>
