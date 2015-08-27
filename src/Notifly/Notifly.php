<?php
/**
 * Notifly: UI Notifications Library
 */
namespace Notifly;

class Notifly
{
    /**
     * Instantiate the object
     */
    public function __construct()
    {
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
        $resolver = new Resolver();
        $renderClass = $resolver->getRenderer($renderer);

        $notifications = $this->fetch();
        $renderClass->render($notifications);
    }
}