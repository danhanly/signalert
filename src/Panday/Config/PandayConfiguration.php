<?php

namespace Panday\Config;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class PandayConfiguration implements ConfigurationInterface
{
    /**
     * Generates the configuration tree builder.
     *
     * @return \Symfony\Component\Config\Definition\Builder\TreeBuilder The tree builder
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('panday');

        $rootNode
            ->children()
                ->scalarNode('renderer')->defaultValue('Panday\Renderer\BootstrapRenderer')->end()
                ->scalarNode('driver')->defaultValue('Panday\Storage\SessionDriver')->end()
            ->end();

        return $treeBuilder;
    }
}