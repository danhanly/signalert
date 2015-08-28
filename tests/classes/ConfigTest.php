<?php

namespace Notifly\Tests;

use Notifly\Config;

class ConfigTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function loadConfiguration()
    {
        $config = new Config();
        $this->assertInstanceOf(Config::class, $config);
    }

    /**
     * @test
     */
    public function loadConfigurationWithSpecifiedDirectory()
    {
        $newDirectory = './tests/config';
        $config = new Config($newDirectory);
        $registeredDirectories = $config->getConfigDirectories();
        $loadedConfigurationFile = $config->getLoadedConfigurationFile();

        $this->assertInstanceOf(Config::class, $config);
        $this->assertContains($newDirectory, $registeredDirectories);
        $this->assertEquals($loadedConfigurationFile, $newDirectory . DIRECTORY_SEPARATOR . '.notifly.yml');
    }
}
