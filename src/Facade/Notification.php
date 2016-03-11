<?php

namespace Snatertj\Notification\Facade;

use Illuminate\Support\Facades\Facade;

class Notification extends Facade {

    /**
     * Get the binding in the IoC container
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'notification';
    }

} 
