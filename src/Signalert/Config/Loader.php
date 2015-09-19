<?php


namespace Signalert\Config;

use Symfony\Component\Config\Definition\Processor;
use Symfony\Component\Config\Loader\FileLoader;
use Symfony\Component\Yaml\Yaml;

class Loader extends FileLoader
{
    /**
     * Loads a resource.
     *
     * @param mixed $resource The resource
     * @param string|null $type The resource type or null if unknown
     *
     * @return array
     * @throws \Exception If something went wrong
     */
    public function load($resource, $type = null)
    {
        $configValues = Yaml::parse(file_get_contents($resource));

        $processor = new Processor();
        $configuration = new SignalertConfiguration();
        $processedConfiguration = $processor->processConfiguration(
            $configuration,
            [$configValues]
        );

        return $processedConfiguration;
    }

    /**
     * Returns whether this class supports the given resource.
     *
     * @param mixed $resource A resource
     * @param string|null $type The resource type or null if unknown
     *
     * @return bool True if this class supports the given resource, false otherwise
     */
    public function supports($resource, $type = null)
    {
        return is_string($resource) && 'yml' === pathinfo(
            $resource,
            PATHINFO_EXTENSION
        );
    }
}