<?php


namespace Signalert\Renderer;

class FoundationRenderer implements RendererInterface
{
    protected $supportedTypes = [
        'info',
        'success',
        'warning',
        'alert',
        'secondary'
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
        $html = "<div class='alert-box {$type} radius' data-alert>";
        foreach ($notifications as $notification) {
            $html .= "{$notification}";
            // If it's not the last notification, add a line break for the next one
            if (end($notifications) !== $notification) {
                $html .= "<br />";
            }
        }
        $html .= "<a href='#' class='close'>&times;</a>";
        $html .= "</div>";

        return $html;
    }
}