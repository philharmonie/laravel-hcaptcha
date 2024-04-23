<?php

namespace Philharmonie\LaravelHcaptcha;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;
use Philharmonie\LaravelHcaptcha\Rules\ValidateHCaptcha;

class LaravelHcaptchaServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/hcaptcha.php' => config_path('hcaptcha.php'),
        ], 'hcaptcha-config');

        $this->loadTranslationsFrom(__DIR__ . '/../lang', 'laravel-hcaptcha');

        Validator::extend('hcaptcha', ValidateHCaptcha::class);

        Blade::directive('hcaptcha', function () {
            return '<div class="h-captcha" data-sitekey="' . config('hcaptcha.site_key') . '"></div>';
        });

        Blade::directive('hcaptchascript', function (string $lang = 'en') {
            return "<script src='https://js.hcaptcha.com/1/api.js?hl=$lang' async defer></script>";
        });
    }

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/hcaptcha.php',
            'hcaptcha'
        );
    }
}
