<?php

namespace App\Helpers;

/**
 * @see \App\Helpers\Support
 */
class Status extends \Illuminate\Support\Facades\Facade
{
    /**
     * Constant representing a successfully login.
     *
     * @var string
     */
    const HESSA_SUCCESS = 600;

    /**
     * Constant representing a failed login.
     *
     * @var string
     */
    const HESSA_ERROR = 601;

    /**
     * Constant representing a failed login.
     *
     * @var string
     */
    const HESSA_SERVER_ERROR = 602;

    /**
     * Constant representing a failed login.
     *
     * @var string
     */
    const HESSA_UNAUTHORIZED = 603;


    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'auth.status';
    }
}
