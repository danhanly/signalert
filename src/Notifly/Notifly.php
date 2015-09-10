<?php
/**
 * Notifly: UI Notifications Library
 */
namespace Notifly;

class Notifly
{
    /**
     * @var string
     */
    protected $configDirectory;

    /**
     * Instantiate the object
     * @param string $configDirectory
     */
    public function __construct($configDirectory = '')
    {
        $this->configDirectory = $configDirectory;
        // Return $this to ensure that library is chain-able
        return $this;
    }

    /**
     * Store the notifications
     * @param string $message The notification test
     * @param string $bucket An identifier used to categorise your message
     * @return bool
     * @throws Exception\NotiflyResolverException
     */
    public function store($message, $bucket)
    {
        $resolver = new Resolver($this->configDirectory);
        $driver = $resolver->getDriver();

        if (true === $driver->store($message, $bucket)) {
            return true;
        }

        return false;
    }

    /**
     * Fetch the notifications
     *
     * @param string $bucket
     * @return array
     * @throws Exception\NotiflyResolverException
     */
    public function fetch($bucket)
    {
        $resolver = new Resolver($this->configDirectory);
        $driver = $resolver->getDriver();

        return $driver->fetch($bucket);
    }

    /**
     * Render the notifications
     * @param string $bucket
     * @param string $type
     * @return string|void
     * @throws Exception\NotiflyResolverException
     */
    public function render($bucket, $type)
    {
        $resolver = new Resolver($this->configDirectory);
        $renderClass = $resolver->getRenderer();

        $notifications = $this->fetch($bucket);
        return $renderClass->render($notifications, $type);
    }
}