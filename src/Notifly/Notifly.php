<?php
/**
 * Notifly: UI Notifications Library
 */
namespace Notifly;

use Notifly\Type\NotiflyType;

class Notifly
{
    /**
     * @var NotiflyType
     */
    protected $notifier;

    public function __construct()
    {
        // Return $this to ensure that library is chainable
        return $this;
    }

    /**
     * @param string $type
     * @param string $message
     * @param string $identifier
     */
    public function notify($type, $message, $identifier)
    {
        // Create the notifier instance only if one doesn't already exist
        if (empty($this->notifier) === true) {
            $this->notifier = $this->resolveType($type);
        }
    }

    /**
     * Returns the appropriate class for
     * @param $type
     * @return NotiflyType
     */
    private function resolveType($type)
    {
        $resolver = new Resolver();
        return $resolver->getClass($type);
    }

    /**
     * @return NotiflyType
     */
    public function getNotifier()
    {
        return $this->notifier;
    }
}