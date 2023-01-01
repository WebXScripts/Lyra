<?php

namespace Webxscripts\Lyra;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Webxscripts\Lyra\Skeleton\SkeletonClass
 */
class LyraFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'lyra';
    }
}
