<?php

namespace Notifly\Renderer;

use Notifly\Exception\MessageTypeUnsupported;

class HtmlRenderer implements RendererInterface
{
    /**
     * Renders all messages as part of the notification stack, beneath the defined identifier, as HTML
     *
     * @param array $notifications
     * @param string $type
     * @return string|void
     * @throws MessageTypeUnsupported
     */
    public function render(array $notifications, $type = 'info')
    {
        // Support only 4 types of notification.
        if (!in_array($type, ['info', 'error', 'warning', 'success'])) {
            throw new MessageTypeUnsupported;
        }

        $className = 'alert-' . $type;

        $html = "<div class='alert {$className}' data-type='info' role='alert'><ul>";
        foreach ($notifications as $notification) {
            $html .= "<li>{$notification}</li>";
        }

        $html .= "</ul></div>";

        return $html;
    }

    /**
     * Renders message or multiple messages as error.
     *
     * @param $notifications
     * @return string|void
     */
    public function renderError($notifications)
    {
        $notifications = $this->normaliseNotifications($notifications);
        $this->validateNotifications($notifications);

        return $this->createHtmlByType($notifications, 'error');
    }

    /**
     * Renders message or multiple messages as success.
     *
     * @param $notifications
     * @return string|void
     */
    public function renderSuccess($notifications)
    {
        $notifications = $this->normaliseNotifications($notifications);
        $this->validateNotifications($notifications);

        return $this->createHtmlByType($notifications, 'success');
    }

    /**
     * Renders message or multiple messages as warning.
     *
     * @param $notifications
     * @return string|void
     */
    public function renderWarning($notifications)
    {
        $notifications = $this->normaliseNotifications($notifications);
        $this->validateNotifications($notifications);

        return $this->createHtmlByType($notifications, 'warning');
    }

    /**
     * Renders message or multiple messages as info.
     *
     * @param $notifications
     * @return string|void
     */
    public function renderInfo($notifications)
    {
        $notifications = $this->normaliseNotifications($notifications);
        $this->validateNotifications($notifications);

        return $this->createHtmlByType($notifications, 'info');
    }

    /**
     * @param $notifications
     * @return array
     */
    private function normaliseNotifications($notifications)
    {
        // If there's only one message to render - make it 1 element array.
        if (is_string($notifications)) {
            $notifications = [$notifications];

            return $notifications;
        }

        return $notifications;
    }

    /**
     * @param $notifications
     */
    private function validateNotifications($notifications)
    {
        if (!is_array($notifications)) {
            throw new \InvalidArgumentException;
        }
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
