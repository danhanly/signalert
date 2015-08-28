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
     */
    public function store()
    {

    }

    /**
     * Fetch the notifications
     *
     * @return array
     */
    public function fetch()
    {

    }

    /**
     * Render the notifications
     * @param string $renderer
     */
    public function render($renderer)
    {
        $resolver = new Resolver($this->configDirectory);
        $renderClass = $resolver->getRenderer($renderer);

        $notifications = $this->fetch();
        $renderClass->render($notifications);
    }
}