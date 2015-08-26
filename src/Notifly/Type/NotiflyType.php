<?php

namespace Notifly\Type;

class NotiflyType
{
    /**
     * @var string
     */
    protected $renderClass;

    /**
     * @var string
     */
    protected $typeString;

    /**
     * Set basic properties
     */
    public function __construct()
    {
        $this->typeString = 'notification';
        $this->renderClass = 'alert alert-error';
    }

    /**
     * Renders all messages as part of the notification stack, beneath the defined identifier, as HTML
     *
     * @param array $notifications
     * @param bool $print
     * @return string|void
     */
    public function render($notifications, $print = false)
    {
        // Create HTML output for notifications
        $html = "<div class='{$this->renderClass}' data-type='{$this->typeString}' role='alert'><ul>";
        foreach ($notifications as $notification) {
            $html .= "<li>{$notification}</li>";
        }
        $html .= "</ul></div>";
        // If you choose to print the notification,
        // simply echo it, otherwise just return it
        if ($print === true) {
            echo $html;
        } else {
            return $html;
        }
    }

    /**
     * Defines what the type string should be for the class.
     * Should be unique.
     *
     * @return string
     */
    public function getTypeString()
    {
        return $this->typeString;
    }
}
