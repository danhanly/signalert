<?php

namespace Notifly\Renderer;

class Info implements RendererInterface
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
        $html = "<div class='alert alert-info' data-type='info' role='alert'><ul>";
        foreach ($notifications as $notification) {
            $html .= "<li>{$notification}</li>";
        }
        $html .= "</ul></div>";

        return $html;
    }
}
