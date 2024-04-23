<?php

namespace Philharmonie\LaravelHcaptcha\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Http;

class ValidateHCaptcha implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $response = Http::asForm()->post('https://hcaptcha.com/siteverify', [
            'secret' => config('hcaptcha.secret_key'),
            'response' => $value
        ]);

        $body = $response->json();

        if (!$body['success']) {
            $fail(__('laravel-hcaptcha::validation.hcaptcha_failed'));
        }
    }
}
