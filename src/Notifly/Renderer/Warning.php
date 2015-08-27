<?php

namespace Notifly\Renderer;

class Warning implements RendererInterface
{
    /**
     * Renders all messages as part of the notification stack, beneath the defined identifier, as HTML
     *
     * @param array $notifications
     * @return string|void
     */
    public function render($notifications)
    {
        // Create HTML output for notifications
        $html = "<div class='alert alert-warning' data-type='warning' role='alert'><ul>";
        foreach ($notifications as $notification) {
            $html .= "<li>{$notification}</li>";
        }
        $html .= "</ul></div>";

        return $html;
    }
}
