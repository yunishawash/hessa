<?php

namespace App\Helpers;

/**
 * @see \App\Helpers\Support
 */
class Constants extends \Illuminate\Support\Facades\Facade
{
    /**
     * CHANNEL ID CONSTANT
     *
     * @var string
     */
    const CHANNEL_DIGITAL_MARKETING = 1;

    /**
     * CHANNEL ID CONSTANT
     *
     * @var string
     */
    const CHANNEL_DATA = 9;

    /**
     * CHANNEL ID CONSTANT
     *
     * @var string
     */
    const CHANNEL_WORD_OF_MOUTH = 10;


    /**
     * CHANNEL ID CONSTANT
     *
     * @var string
     */
    const CHANNEL_ACTIVITIES = 11;



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
