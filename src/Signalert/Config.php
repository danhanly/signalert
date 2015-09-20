<?php

namespace Signalert;

use Signalert\Config\Loader;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Config\Loader\DelegatingLoader;
use Symfony\Component\Config\Loader\LoaderResolver;

class Config
{
    /**
     * Potential search locations for a config file
     *
     * @var array
     */
    protected $configDirectories = [
        '',
        'config',
        'app/config',
    ];

    /**
     * Array of parsed and sorted configuration values
     *
     * @var array
     */
    protected $configuration;

    /**
     * The loaded Configuration File
     *
     * @var string
     */
    protected $loadedConfigurationFile;

    public function __construct($searchDirectory = '')
    {
        $this->expandConfigDirectories();
        // Add the in-bundle config to the search directories
        $this->configDirectories[] = __DIR__ . '/../../config';
        // Ensure config directories are relative paths
        // If $searchDirectory is specified, add it to the top of the $configDirectories
        if (false === empty($searchDirectory)) {
            array_unshift($this->configDirectories, $searchDirectory);
        }

        $locator = new FileLocator($this->configDirectories);
        $filePath = $locator->locate('.signalert.yml', null, true);

        $loader = new Loader($locator);
        $loaderResolver = new LoaderResolver([$loader]);
        $delegatingLoader = new DelegatingLoader($loaderResolver);

        $configuration = $delegatingLoader->load($filePath);

        $this->loadedConfigurationFile = $filePath;
        $this->configuration = $configuration;

        return $this;
    }

    /**
     * Gets all configuration values
     *
     * @return array
     */
    public function getAllConfiguration()
    {
        return $this->configuration;
    }

    /**
     * Identifies the storage driver from the config
     *
     * @return string
     */
    public function getDriver()
    {
        return $this->configuration['driver'];
    }

    /**
     * Gets the configured renderer
     *
     * @return string
     */
    public function getRenderer()
    {
        return $this->configuration['renderer'];
    }

    /**
     * Retrieve all configuration directories
     *
     * @return array
     */
    public function getConfigDirectories()
    {
        return $this->configDirectories;
    }

    /**
     * @return string
     */
    public function getLoadedConfigurationFile()
    {
        return $this->loadedConfigurationFile;
    }

    /**
     * Ensures that config directories are relative paths
     */
    private function expandConfigDirectories()
    {
        $newPaths = [];
        foreach ($this->configDirectories as $filePath) {
            $newPaths[] = __DIR__ . '/../../../../../' . $filePath;
        }
        $this->configDirectories = $newPaths;
    }
}