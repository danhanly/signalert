<?php

namespace Notifly\Tests;

use Notifly\Renderer\HtmlRenderer;
use Notifly\Resolver;

/**
 * Class ResolverTest
 *
 * @covers \Notifly\Resolver
 */
class ResolverTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     * @covers \Notifly\Resolver::getRenderer
     */
    public function resolveDefaultRenderer()
    {
        $resolver = new Resolver();
        $renderer = $resolver->getRenderer();

        $this->assertInstanceOf(HtmlRenderer::class, $renderer);
    }
}