<?php

use Illuminate\Support\Facades\Config;

function lang($lang = null)
{
    if (isset($lang)) {
        return app()->islocale($lang);
    } else {
        return app()->getlocale();
    }
}

function Settings()
{
    if (! Config::get('Settings')) {
        Config::set('Settings', \App\Models\Setting::get());
    }

    return Config::get('Settings');
}

function setting($key)
{
    return Settings()->where('key', $key)->first()->value ?? null;
}

function DT_Lang()
{
    if (lang('ar')) {
        return '//cdn.datatables.net/plug-ins/1.10.16/i18n/Arabic.json';
    } else {
        return '//cdn.datatables.net/plug-ins/1.10.16/i18n/English.json';
    }
}
