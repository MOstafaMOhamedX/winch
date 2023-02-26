<?php

namespace App\Http\Controllers\API;

use App\Functions\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Models\Setting;

class SettingController extends Controller
{
    private $lang;

    public function __construct()
    {
        $this->lang = request('lang', 'ar');
        if (in_array($this->lang, config()->get('app.locales'))) {
            $locale = $this->lang;
        } else {
            $locale = config()->get('app.locale');
        }
        app()->setLocale($locale);
    }

    public function about()
    {
        return ResponseHelper::make(Setting::where('key', 'about_'.$this->lang)->first()->value);
    }

    public function contact()
    {
        $settings = Setting::where('type', 'contact')->get();
        $contact = [];
        foreach ($settings as $setting) {
            if (in_array($setting->key, ['address_ar', 'address_en'])) {
                if ($setting->key == 'address_'.$this->lang) {
                    $contact['address'] = $setting->value;
                }
            } else {
                $contact[$setting->key] = $setting->value;
            }
        }

        return ResponseHelper::make($contact);
    }

    public function terms()
    {
        return ResponseHelper::make(Setting::where('key', 'terms_'.$this->lang)->first()->value);
    }

    public function privacy()
    {
        return ResponseHelper::make(Setting::where('key', 'privacy_'.$this->lang)->first()->value);
    }

    public function support()
    {
        return ResponseHelper::make(Setting::where('key', 'technical_support')->first()->value);
    }
}
