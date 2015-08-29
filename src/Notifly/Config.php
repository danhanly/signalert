<?php

namespace Notifly;

use Notifly\Config\Loader;
use Notifly\Exception\NotiflyInvalidRendererException;
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
        './',
        './config',
        './app/config',
        './config',
        './vendor/danhanly/notifly/config'
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
        // If $searchDirectory is specified, add it to the top of the $configDirectories
        if (false === empty($searchDirectory)) {
            array_unshift($this->configDirectories, $searchDirectory);
        }

        $locator = new FileLocator($this->configDirectories);
        $filePath = $locator->locate('.notifly.yml', null, true);

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
     * Identifies a specific renderer by string from the config
     *
     * @param string $renderer
     * @return string
     * @throws NotiflyInvalidRendererException
     */
    public function getRenderer($renderer)
    {
        $allRenderers = $this->configuration['renderers'];
        // Does renderer requested by the user currently exist in the configuration?
        if (false === in_array($renderer, array_keys($allRenderers))) {
            throw new NotiflyInvalidRendererException;
        }
        return $this->configuration['renderers'][$renderer];
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
}