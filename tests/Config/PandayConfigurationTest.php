<?php

/**
 * Class PandayConfigurationTest
 *
 * @covers \Panday\Config\PandayConfiguration
 */
class PandayConfigurationTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers \Panday\Config\PandayConfiguration::getConfigTreeBuilder
     * @test
     */
    public function treeBuilder()
    {
        $config = new \Panday\Config\PandayConfiguration();
        $builder = $config->getConfigTreeBuilder();

        $this->assertInstanceOf('Symfony\Component\Config\Definition\Builder\TreeBuilder', $builder);
    }

    /**
     * @covers \Panday\Config\PandayConfiguration::getConfigTreeBuilder
     * @test
     */
    public function rendererDefaults()
    {
        $locatorMock = $this->getMock('\Symfony\Component\Config\FileLocator');
        $loader      = new \Panday\Config\Loader($locatorMock);
        $config      = $loader->load('./tests/utils/config/.norenderers.yml');
        $this->assertArrayHasKey('renderer', $config);
        $this->assertEquals('Panday\Renderer\BootstrapRenderer', $config['renderer']);
    }

    /**
     * @covers \Panday\Config\PandayConfiguration::getConfigTreeBuilder
     * @test
     */
    public function driverDefaults()
    {
        $locatorMock = $this->getMock('\Symfony\Component\Config\FileLocator');
        $loader = new \Panday\Config\Loader($locatorMock);
        $config = $loader->load('./tests/utils/config/.nodriver.yml');
        // Check Driver Key has been Added
        $this->assertArrayHasKey('driver', $config);
        $this->assertEquals('Panday\Storage\SessionDriver', $config['driver']);
    }
}