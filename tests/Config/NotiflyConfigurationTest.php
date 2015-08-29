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
        $loader = new \Notifly\Config\Loader($locatorMock);
        $config = $loader->load('./tests/utils/config/.norenderers.yml');
        // Check Renderers Key has been Added
        $this->assertArrayHasKey('renderers', $config);
        // Check The Child Nodes have been Set
        $this->assertArrayHasKey('error', $config['renderers']);
        $this->assertArrayHasKey('warning', $config['renderers']);
        $this->assertArrayHasKey('info', $config['renderers']);
        $this->assertArrayHasKey('success', $config['renderers']);
        // Check Default Values
        $this->assertEquals(\Notifly\Renderer\Error::class, $config['renderers']['error']);
        $this->assertEquals(\Notifly\Renderer\Warning::class, $config['renderers']['warning']);
        $this->assertEquals(\Notifly\Renderer\Info::class, $config['renderers']['info']);
        $this->assertEquals(\Notifly\Renderer\Success::class, $config['renderers']['success']);
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