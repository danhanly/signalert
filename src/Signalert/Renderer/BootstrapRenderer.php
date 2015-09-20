<?php

namespace Signalert\Renderer;

class BootstrapRenderer implements RendererInterface
{
    protected $supportedTypes = [
        'info',
        'error',
        'warning',
        'success'
    ];

    /**
     * Renders all messages as part of the notification stack, beneath the defined identifier, as HTML
     *
     * @param array $notifications
     * @param string $type
     * @return string|void
     */
    public function render(array $notifications, $type = 'info')
    {
        // Ensure Type is Supported
        if (in_array($type, $this->supportedTypes) === false) {
            // If not, fall back to default
            $type = 'info';
        }

        // If there aren't any notifications, then return an empty string
        if (empty($notifications) === true) {
            return '';
        }

        $html = $this->createHtmlByType($notifications, $type);
        return $html;
    }

    /**
     * Create and return html string.
     *
     * @param array $notifications
     * @param string $type
     * @return string
     */
    private function createHtmlByType(array $notifications, $type)
    {
        $className = 'alert-' . $type;

        $html = "<div class='alert {$className}' data-type='info' role='alert'>";
        foreach ($notifications as $notification) {
            $html .= "{$notification}";
            // If it's not the last notification, add a line break for the next one
            if (end($notifications) !== $notification) {
                $html .= "<br />";
            }
        }

        $html .= "</div>";

        return $html;
    }
}