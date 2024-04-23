<?php

namespace Philharmonie\LaravelHcaptcha;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Philharmonie\LaravelHcaptcha\Skeleton\SkeletonClass
 */
class LaravelHcaptchaFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravel-hcaptcha';
    }
}
