<?php

namespace Notifly;

use Notifly\Exception\NotiflyResolverException;
use Notifly\Renderer\RendererInterface;
use Notifly\Storage\DriverInterface;
use ReflectionClass;

class Resolver
{
    /**
     * @var string
     */
    protected $configDirectory;

    /**
     * @param $configDirectory
     */
    public function __construct($configDirectory = '')
    {
        $this->configDirectory = $configDirectory;
    }

    /**
     * Returns a class which matches the $type
     *
     * @param string $renderer
     * @return RendererInterface
     * @throws Exception\NotiflyInvalidRendererException
     * @throws NotiflyResolverException
     */
    public function getRenderer($renderer)
    {
        // Attempt to retrieve the renderer config
        $config = new Config($this->configDirectory);
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

    /**
     * Returns a valid driver class
     *
     * @return DriverInterface
     * @throws NotiflyResolverException
     */
    public function getDriver()
    {
        // Attempt to retrieve the driver config
        $config = new Config($this->configDirectory);
        $driverClass = $config->getDriver();
        // Validate Driver Class
        $reflection = new ReflectionClass($driverClass);
        // Ensure class is built with the correct interface
        if (false === $reflection->implementsInterface(DriverInterface::class)) {
            throw new NotiflyResolverException;
        }
        // If it all checks out, resolve the class and instantiate
        return $reflection->newInstance();

    }
}