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
}