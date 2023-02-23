<?php

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
    if (!Config::get('Settings'))
        Config::set('Settings', \App\Models\Setting::get());
    return Config::get('Settings');
}

function setting($key)
{
    return Settings()->where('key', $key)->first()->value ?? null;
}
