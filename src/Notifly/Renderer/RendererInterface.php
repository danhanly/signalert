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

    /**
     * Renders message or multiple messages as error.
     *
     * @param $notifications
     * @return string|void
     */
    public function renderError($notifications);

    /**
     * Renders message or multiple messages as success.
     *
     * @param $notifications
     * @return string|void
     */
    public function renderSuccess($notifications);

    /**
     * Renders message or multiple messages as warning.
     *
     * @param $notifications
     * @return string|void
     */
    public function renderWarning($notifications);

    /**
     * Renders message or multiple messages as info.
     *
     * @param $notifications
     * @return string|void
     */
    public function renderInfo($notifications);

}