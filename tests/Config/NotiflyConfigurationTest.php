<?php

/**
 * Class NotiflyConfigurationTest
 *
 * @covers \Notifly\Config\NotiflyConfiguration
 */
class NotiflyConfigurationTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers \Notifly\Config\NotiflyConfiguration::getConfigTreeBuilder
     * @test
     */
    public function treeBuilder()
    {
        $config = new \Notifly\Config\NotiflyConfiguration();
        $builder = $config->getConfigTreeBuilder();

        $this->assertInstanceOf(\Symfony\Component\Config\Definition\Builder\TreeBuilder::class, $builder);
    }

    /**
     * @covers \Notifly\Config\NotiflyConfiguration::getConfigTreeBuilder
     * @test
     */
    public function rendererDefaults()
    {
        $locatorMock = $this->getMock('\Symfony\Component\Config\FileLocator');
        $loader      = new \Notifly\Config\Loader($locatorMock);
        $config      = $loader->load('./tests/utils/config/.norenderers.yml');

        $this->assertArrayHasKey('renderer', $config);
        $this->assertEquals(Notifly\Renderer\HtmlRenderer::class, $config['renderer']);
    }

    /**
     * @covers \Notifly\Config\NotiflyConfiguration::getConfigTreeBuilder
     * @test
     */
    public function driverDefaults()
    {
        $locatorMock = $this->getMock('\Symfony\Component\Config\FileLocator');
        $loader = new \Notifly\Config\Loader($locatorMock);
        $config = $loader->load('./tests/utils/config/.nodriver.yml');
        // Check Driver Key has been Added
        $this->assertArrayHasKey('driver', $config);
        $this->assertEquals(\Notifly\Storage\SessionDriver::class, $config['driver']);
    }
}