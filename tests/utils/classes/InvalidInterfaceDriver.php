<?php

namespace Panday\Tests;

class InvalidInterfaceDriver
{

    /**
     * Store the notifications using the driver
     *
     * @param string $message
     * @param string $bucket
     * @return bool
     */
    public function store($message, $bucket)
    {
        return true;
    }

    /**
     * Fetch the notifications from the driver
     *
     * @param string $bucket
     * @return array
     */
    public function fetch($bucket)
    {
        return [];
    }
}