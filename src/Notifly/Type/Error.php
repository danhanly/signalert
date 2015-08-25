<?php

namespace Notifly\Type;

class Error implements NotiflyType
{
    /**
     * Adds message to notification stack, beneath the defined identifier
     *
     * @param string $message
     * @param string $identifier
     * @return bool
     */
    public function notify($message, $identifier)
    {
        // TODO: Implement notify() method.
    }

    /**
     * Fetches all messages as part of the notification stack, beneath the defined identifier
     *
     * @param string $identifier
     * @param bool $json
     * @return array
     */
    public function fetch($identifier, $json = false)
    {
        // TODO: Implement fetch() method.
    }

    /**
     * Renders all messages as part of the notification stack, beneath the defined identifier, as HTML
     *
     * @param string $identifier
     * @return string
     */
    public function render($identifier)
    {
        // TODO: Implement render() method.
    }

    /**
     * Defines what the type string should be for the class.
     * Should be unique.
     *
     * @return string
     */
    public function defineTypeString()
    {
        return 'error';
    }
}