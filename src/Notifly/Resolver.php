<?php

namespace Notifly;

use Notifly\Exception\NotiflyResolverException;
use Notifly\Renderer\RendererInterface;
use ReflectionClass;

class Resolver
{
    /**
     * Returns a class which matches the $type
     *
     * @param string $renderer
     * @return RendererInterface
     * @throws NotiflyResolverException
     */
    public function getRenderer($renderer)
    {
        // Attempt to retrieve the renderer config
        $config = new Config();
        $rendererClass = $config->getRenderer($renderer);
        // Validate Renderer Class
        $reflection = new ReflectionClass($rendererClass);
        // Ensure class is built with the correct interface
        if (false === $reflection->implementsInterface(RendererInterface::class)) {
            throw new NotiflyResolverException;
        }
        // If it all checks out, resolve the class and instantiate
        return $reflection->newInstance();
    }
}