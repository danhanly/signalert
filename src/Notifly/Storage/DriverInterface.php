<?php

namespace Notifly\Storage;

interface DriverInterface
{
    /**
     * Store the notifications using the driver
     *
     * @param string $message
     * @param string $bucket
     * @return bool
     */
    public function store($message, $bucket);

    /**
     * Fetch the notifications from the driver
     *
     * @param string $bucket
     * @return array
     */
    public function fetch($bucket);
}