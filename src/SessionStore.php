<?php

namespace Snatertj\Notification;

interface SessionStore
{

    /**
     * Flash a message to the session.
     *
     * @param $name
     * @param $data
     */
    public function notification($name, $data);

} 
