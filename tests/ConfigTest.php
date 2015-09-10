<?php

use Notifly\Config;

/**
 * Class ConfigTest
 *
 * @covers \Notifly\Config
 */
class ConfigTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers \Notifly\Config::__construct
     * @test
     */
    public function loadConfiguration()
    {
        $config = new Config();
        $this->assertInstanceOf('Notifly\Config', $config);
    }

    /**
     * @covers \Notifly\Config::__construct
     * @test
     */
    public function loadConfigurationWithSpecifiedDirectory()
    {
        $newDirectory = './tests/utils/config';
        $config = new Config($newDirectory);

        $this->assertInstanceOf('Notifly\Config', $config);
    }

    /**
     * @covers \Notifly\Config::getConfigDirectories
     * @test
     */
    public function checkApplicableDirectoriesWhenSpecifyingDirectory()
    {
        $newDirectory = './tests/utils/config';
        $config = new Config($newDirectory);
        $registeredDirectories = $config->getConfigDirectories();

        $this->assertContains($newDirectory, $registeredDirectories);
    }

    /**
     * @covers \Notifly\Config::getLoadedConfigurationFile
     * @test
     */
    public function checkCorrectConfigFileIsLoadedWhenSpecifyingDirectory()
    {
        $newDirectory = './tests/utils/config';
        $config = new Config($newDirectory);
        $loadedConfigurationFile = $config->getLoadedConfigurationFile();

        $this->assertEquals($loadedConfigurationFile, $newDirectory . DIRECTORY_SEPARATOR . '.notifly.yml');
    }

    /**
     * @covers \Notifly\Config::getAllConfiguration
     * @test
     */
    public function getAllConfigurationsWithAndWithoutSpecifiedDirectory()
    {
        // Get and test all configiurations without specifying a directory
        $config = new Config();
        $configsWithout = $config->getAllConfiguration();

        $this->assertArrayHasKey('renderer', $configsWithout);
        $this->assertArrayHasKey('driver', $configsWithout);

        // Get and test all configurations with specifying a directory
        $newDirectory = './tests/utils/config';
        $config = new Config($newDirectory);
        $configsWith = $config->getAllConfiguration();

        $this->assertArrayHasKey('renderer', $configsWith);
        $this->assertArrayHasKey('driver', $configsWith);
    }

    /**
     * @covers \Notifly\Config::getDriver
     * @test
     */
    public function getDriverClassName()
    {
        $config = new Config();
        $this->assertInternalType('string', $config->getDriver());
    }

    /**
     * @covers \Notifly\Config::getRenderer
     * @test
     */
    public function getSpecificRendererClassName()
    {
        $config = new Config();
        $this->assertInternalType('string', $config->getRenderer());
    }
}
