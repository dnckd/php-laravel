<?php

declare(strict_types=1);

namespace App\CustomFacade\MultiFactorAuthentication;

use Illuminate\Support\Facades\Facade;

/**
 * @method static string getStart()
 *
 * @see MultiFactorAuthenticationFacade
 */
class MultiFactorAuthentication extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'mfa';
    }
}
