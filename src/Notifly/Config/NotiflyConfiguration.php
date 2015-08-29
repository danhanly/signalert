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
                ->scalarNode('renderer')->defaultValue(\Notifly\Renderer\HtmlRenderer::class)->end()
                ->scalarNode('driver')->defaultValue(\Notifly\Storage\SessionDriver::class)->end()
            ->end();

        return $treeBuilder;
    }
}