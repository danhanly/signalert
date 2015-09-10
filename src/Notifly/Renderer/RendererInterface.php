<?php

namespace Notifly\Renderer;

interface RendererInterface
{
    /**
     * Renders all messages as part of the notification stack, beneath the defined identifier, as HTML
     *
     * @param array $notifications
     * @param string $type
     * @return string|void
     */
    public function render(array $notifications, $type = 'info');
}