<?php
/**
 * Notifly: UI Notifications Library
 */
namespace Notifly;

class Notifly
{
    public function __construct()
    {
        // Return $this to ensure that library is chainable
        return $this;
    }

    /**
     * @param $type
     * @param $message
     * @param $identifier
     */
    public function notify($type, $message, $identifier)
    {
        $notifier = $this->resolveType($type);
    }

    private function resolveType($type)
    {

    }
}