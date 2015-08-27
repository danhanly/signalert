<?php

use Notifly\Notifly;

class ResolverTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function resolveDefaultRenderer()
    {
        $resolver = new \Notifly\Resolver();
        $renderer = $resolver->getRenderer('error');

        $this->assertInstanceOf(\Notifly\Renderer\Error::class, $renderer);
    }

    /**
     * @test
     * @incompleteTest
     */
    public function resolveInvalidRenderer()
    {

    }
}