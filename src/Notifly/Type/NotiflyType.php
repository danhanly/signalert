<?php

namespace Notifly\Type;

interface NotiflyType
{
    /**
     * Adds message to notification stack, beneath the defined identifier
     *
     * @param string $message
     * @param string $identifier
     * @return bool
     */
    public function notify($message, $identifier);

    /**
     * Fetches all messages as part of the notification stack, beneath the defined identifier
     *
     * @param string $identifier
     * @param bool $json
     * @return array
     */
    public function fetch($identifier, $json = false);

    /**
     * Renders all messages as part of the notification stack, beneath the defined identifier, as HTML
     *
     * @param string $identifier
     * @return string
     */
    public function render($identifier);

    /**
     * Defines what the type string should be for the class.
     * Should be unique.
     *
     * @return string
     */
    public function defineTypeString();
}