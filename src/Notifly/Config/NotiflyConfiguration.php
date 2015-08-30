<?php

namespace Notifly\Config;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class NotiflyConfiguration implements ConfigurationInterface
{
    /**
     * Generates the configuration tree builder.
     *
     * @return \Symfony\Component\Config\Definition\Builder\TreeBuilder The tree builder
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('notifly');

        $rootNode
            ->children()
                ->arrayNode('renderers')->addDefaultsIfNotSet()
                    ->children()
                        ->scalarNode('error')->defaultValue('Notifly\Renderer\Error')->end()
                        ->scalarNode('warning')->defaultValue('Notifly\Renderer\Warning')->end()
                        ->scalarNode('info')->defaultValue('Notifly\Renderer\Info')->end()
                        ->scalarNode('success')->defaultValue('Notifly\Renderer\Success')->end()
                    ->end()
                ->end()
                ->scalarNode('driver')->defaultValue('Notifly\Storage\SessionDriver')->end()
            ->end();

        return $treeBuilder;
    }
}