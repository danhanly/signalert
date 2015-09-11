<?php

namespace Panday;

use Panday\Exception\PandayResolverException;
use Panday\Renderer\RendererInterface;
use Panday\Storage\DriverInterface;
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
     * Returns a valid renderer class
     *
     * @return RendererInterface
     * @throws Exception\PandayInvalidRendererException
     * @throws PandayResolverException
     */
    public function getRenderer()
    {
        // Attempt to retrieve the renderer config
        $config = new Config($this->configDirectory);
        $rendererClass = $config->getRenderer();
        // Validate Renderer Class
        $reflection = new ReflectionClass($rendererClass);
        // Ensure class is built with the correct interface
        if (false === $reflection->implementsInterface('Panday\Renderer\RendererInterface')) {
            throw new PandayResolverException;
        }
        // If it all checks out, resolve the class and instantiate
        return $reflection->newInstance();
    }

    /**
     * Returns a valid driver class
     *
     * @return DriverInterface
     * @throws PandayResolverException
     */
    public function getDriver()
    {
        // Attempt to retrieve the driver config
        $config = new Config($this->configDirectory);
        $driverClass = $config->getDriver();
        // Validate Driver Class
        $reflection = new ReflectionClass($driverClass);
        // Ensure class is built with the correct interface
        if (false === $reflection->implementsInterface('Panday\Storage\DriverInterface')) {
            throw new PandayResolverException;
        }
        // If it all checks out, resolve the class and instantiate
        return $reflection->newInstance();

    }
}