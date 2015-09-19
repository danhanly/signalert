<?php

namespace Signalert\Config;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class SignalertConfiguration implements ConfigurationInterface
{
    /**
     * Generates the configuration tree builder.
     *
     * @return \Symfony\Component\Config\Definition\Builder\TreeBuilder The tree builder
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('signalert');

        $rootNode
            ->children()
                ->scalarNode('renderer')->defaultValue('Signalert\Renderer\BootstrapRenderer')->end()
                ->scalarNode('driver')->defaultValue('Signalert\Storage\SessionDriver')->end()
            ->end();

        return $treeBuilder;
    }
}