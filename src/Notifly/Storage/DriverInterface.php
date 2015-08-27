<?php

namespace Notifly\Storage;

interface DriverInterface
{
    /**
     * Store the notifications using the driver
     *
     * @return bool
     */
    public function store();

    /**
     * Fetch the notifications from the driver
     *
     * @return array
     */
    public function fetch();
}