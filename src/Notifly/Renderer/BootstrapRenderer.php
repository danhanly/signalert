<?php

namespace Notifly\Renderer;

use Notifly\Exception\NotiflyRenderTypeUnsupported;

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
     * @throws NotiflyRenderTypeUnsupported
     */
    public function render(array $notifications, $type = 'info')
    {
        // Ensure Type is Supported
        if (in_array($type, $this->supportedTypes) === false) {
            throw new NotiflyRenderTypeUnsupported;
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

        $html = "<div class='alert {$className}' data-type='info' role='alert'><ul>";
        foreach ($notifications as $notification) {
            $html .= "<li>{$notification}</li>";
        }

        $html .= "</ul></div>";

        return $html;
    }
}