<?php

/**
 * Class SignalertConfigurationTest
 *
 * @covers \Signalert\Config\SignalertConfiguration
 */
class SignalertConfigurationTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers \Signalert\Config\SignalertConfiguration::getConfigTreeBuilder
     * @test
     */
    public function treeBuilder()
    {
        $config = new \Signalert\Config\SignalertConfiguration();
        $builder = $config->getConfigTreeBuilder();

        $this->assertInstanceOf('Symfony\Component\Config\Definition\Builder\TreeBuilder', $builder);
    }

    /**
     * @covers \Signalert\Config\SignalertConfiguration::getConfigTreeBuilder
     * @test
     */
    public function rendererDefaults()
    {
        $locatorMock = $this->getMock('\Symfony\Component\Config\FileLocator');
        $loader      = new \Signalert\Config\Loader($locatorMock);
        $config      = $loader->load('./tests/utils/config/.norenderers.yml');
        $this->assertArrayHasKey('renderer', $config);
        $this->assertEquals('Signalert\Renderer\BootstrapRenderer', $config['renderer']);
    }

    /**
     * @covers \Signalert\Config\SignalertConfiguration::getConfigTreeBuilder
     * @test
     */
    public function driverDefaults()
    {
        $locatorMock = $this->getMock('\Symfony\Component\Config\FileLocator');
        $loader = new \Signalert\Config\Loader($locatorMock);
        $config = $loader->load('./tests/utils/config/.nodriver.yml');
        // Check Driver Key has been Added
        $this->assertArrayHasKey('driver', $config);
        $this->assertEquals('Signalert\Storage\SessionDriver', $config['driver']);
    }
}