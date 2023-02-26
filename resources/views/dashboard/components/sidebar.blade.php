<aside class="sidebar-nav-wrapper active">
    <div class="navbar-logo">
        <a href="{{ route('admin.home') }}">
            <img src="{{ asset(setting('logo')) }}" alt="logo" style="height: 100px" />
        </a>
    </div>
    <nav class="sidebar-nav">
        <ul>
            <li class="nav-item @if(str_contains(Route::currentRouteName(), 'settings')) active @endif">
                <a class="collapsed" href="#0" class="" data-bs-toggle="collapse" data-bs-target="#settings" aria-controls="settings" aria-expanded="true" aria-label="Toggle navigation">
                    <span class="icon text-center">
                        <i style="width: 20px;" class="fa-solid fa-users-between-lines mx-2"></i>
                    </span>
                    <span class="text">{{ __('settings') }}</span>
                </a>
                <ul id="settings" class="dropdown-nav mx-4 collapse" style="">
                    @foreach (Settings()->unique('type')->sortBy('type') as $item)
                    <li><a href="{{ route('admin.type.settings.index',['type'=>$item->type]) }}">{{ __($item->type) }}</a></li>
                    @endforeach
                </ul>
            </li>
            <li class="nav-item @if(str_contains(Route::currentRouteName(), 'admins')) active @endif">
                <a class="collapsed" href="#0" class="" data-bs-toggle="collapse" data-bs-target="#admins" aria-controls="admins" aria-expanded="true" aria-label="Toggle navigation">
                    <span class="icon text-center">
                        <i style="width: 20px;" class="fa-solid fa-users-between-lines mx-2"></i>
                    </span>
                    <span class="text">{{ __('admins') }}</span>
                </a>
                <ul id="admins" class="dropdown-nav mx-4 collapse" style="">
                    <li><a href="{{ route('admin.admins.index') }}">{{ __('viewAll') }}</a></li>
                    <li><a href="{{ route('admin.admins.create') }}">{{ __('add') }}</a></li>
                </ul>
            </li>
            <li class="nav-item @if(str_contains(Route::currentRouteName(), 'drivers')) active @endif">
                <a class="collapsed" href="#0" class="" data-bs-toggle="collapse" data-bs-target="#drivers" aria-controls="drivers" aria-expanded="true" aria-label="Toggle navigation">
                    <span class="icon text-center">
                        <i style="width: 20px;" class="fa-solid fa-users-between-lines mx-2"></i>
                    </span>
                    <span class="text">{{ __('drivers') }}</span>
                </a>
                <ul id="drivers" class="dropdown-nav mx-4 collapse" style="">
                    <li><a href="{{ route('admin.drivers.index') }}">{{ __('viewAll') }}</a></li>
                    <li><a href="{{ route('admin.drivers.create') }}">{{ __('add') }}</a></li>
                </ul>
            </li>
            <li class="nav-item @if(str_contains(Route::currentRouteName(), 'clients')) active @endif">
                <a class="collapsed" href="#0" class="" data-bs-toggle="collapse" data-bs-target="#clients" aria-controls="clients" aria-expanded="true" aria-label="Toggle navigation">
                    <span class="icon text-center">
                        <i style="width: 20px;" class="fa-solid fa-users-between-lines mx-2"></i>
                    </span>
                    <span class="text">{{ __('clients') }}</span>
                </a>
                <ul id="clients" class="dropdown-nav mx-4 collapse" style="">
                    <li><a href="{{ route('admin.clients.index') }}">{{ __('viewAll') }}</a></li>
                    <li><a href="{{ route('admin.clients.create') }}">{{ __('add') }}</a></li>
                </ul>
            </li>
            <li class="nav-item @if(str_contains(Route::currentRouteName(), 'contacts')) active @endif">
                <a class="collapsed" href="#0" class="" data-bs-toggle="collapse" data-bs-target="#contacts" aria-controls="contacts" aria-expanded="true" aria-label="Toggle navigation">
                    <span class="icon text-center">
                        <i style="width: 20px;" class="fa-solid fa-users-between-lines mx-2"></i>
                    </span>
                    <span class="text">{{ __('contacts') }}</span>
                </a>
                <ul id="contacts" class="dropdown-nav mx-4 collapse" style="">
                    <li><a href="{{ route('admin.contacts.index') }}">{{ __('viewAll') }}</a></li>
                </ul>
            </li>
            <li class="nav-item @if(str_contains(Route::currentRouteName(), 'countries')) active @endif">
                <a class="collapsed" href="#0" class="" data-bs-toggle="collapse" data-bs-target="#countries" aria-controls="countries" aria-expanded="true" aria-label="Toggle navigation">
                    <span class="icon text-center">
                        <i style="width: 20px;" class="fa-solid fa-users-between-lines mx-2"></i>
                    </span>
                    <span class="text">{{ __('countries') }}</span>
                </a>
                <ul id="countries" class="dropdown-nav mx-4 collapse" style="">
                    <li><a href="{{ route('admin.countries.index') }}">{{ __('viewAll') }}</a></li>
                    <li><a href="{{ route('admin.countries.create') }}">{{ __('add') }}</a></li>
                </ul>
            </li>
            <li class="nav-item @if(str_contains(Route::currentRouteName(), 'coupons')) active @endif">
                <a class="collapsed" href="#0" class="" data-bs-toggle="collapse" data-bs-target="#coupons" aria-controls="coupons" aria-expanded="true" aria-label="Toggle navigation">
                    <span class="icon text-center">
                        <i style="width: 20px;" class="fa-solid fa-users-between-lines mx-2"></i>
                    </span>
                    <span class="text">{{ __('coupons') }}</span>
                </a>
                <ul id="coupons" class="dropdown-nav mx-4 collapse" style="">
                    <li><a href="{{ route('admin.coupons.index') }}">{{ __('viewAll') }}</a></li>
                    <li><a href="{{ route('admin.coupons.create') }}">{{ __('add') }}</a></li>
                </ul>
            </li>
            <li class="nav-item @if(str_contains(Route::currentRouteName(), 'faq')) active @endif">
                <a class="collapsed" href="#0" class="" data-bs-toggle="collapse" data-bs-target="#faq" aria-controls="faq" aria-expanded="true" aria-label="Toggle navigation">
                    <span class="icon text-center">
                        <i style="width: 20px;" class="fa-solid fa-users-between-lines mx-2"></i>
                    </span>
                    <span class="text">{{ __('faq') }}</span>
                </a>
                <ul id="faq" class="dropdown-nav mx-4 collapse" style="">
                    <li><a href="{{ route('admin.faq.index') }}">{{ __('viewAll') }}</a></li>
                    <li><a href="{{ route('admin.faq.create') }}">{{ __('add') }}</a></li>
                </ul>
            </li>
            <li class="nav-item @if(str_contains(Route::currentRouteName(), 'roles')) active @endif">
                <a class="collapsed" href="#0" class="" data-bs-toggle="collapse" data-bs-target="#roles" aria-controls="roles" aria-expanded="true" aria-label="Toggle navigation">
                    <span class="icon text-center">
                        <i style="width: 20px;" class="fa-solid fa-users-between-lines mx-2"></i>
                    </span>
                    <span class="text">{{ __('roles') }}</span>
                </a>
                <ul id="roles" class="dropdown-nav mx-4 collapse" style="">
                    <li><a href="{{ route('admin.roles.index') }}">{{ __('viewAll') }}</a></li>
                    <li><a href="{{ route('admin.roles.create') }}">{{ __('add') }}</a></li>
                    <li class="nav-item @if(str_contains(Route::currentRouteName(), 'permissions')) active @endif">
                        <a class="collapsed" href="#0" class="" data-bs-toggle="collapse" data-bs-target="#permissions" aria-controls="permissions" aria-expanded="true" aria-label="Toggle navigation">
                            <span class="icon text-center">
                                <i style="width: 20px;" class="fa-solid fa-users-between-lines mx-2"></i>
                            </span>
                            <span class="text">{{ __('permissions') }}</span>
                        </a>
                        <ul id="permissions" class="dropdown-nav mx-4 collapse" style="">
                            <li><a href="{{ route('admin.permissions.index') }}">{{ __('viewAll') }}</a></li>
                            <li><a href="{{ route('admin.permissions.create') }}">{{ __('add') }}</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            @if (lang('en'))
            <li class="nav-item">
                <a href="{{ route('lang', 'ar') }}">
                    <span class="icon text-center">
                        <img src="{{ asset('language/ar.png') }}" style="border-radius: 50%;width: 20px;" class="mx-2">
                    </span>
                    <span class="text">Arabic</span>
                </a>
            </li>
            @else
            <li class="nav-item">
                <a href="{{ route('lang', 'en') }}">
                    <span class="icon text-center">
                        <img src="{{ asset('language/en.png') }}" style="border-radius: 50%;width: 20px;" class="mx-2">
                    </span>
                    <span class="text">English</span>
                </a>
            </li>
            @endif
        </ul>
    </nav>
</aside>
