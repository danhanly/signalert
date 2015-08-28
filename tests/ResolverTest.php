<?php

use Notifly\Exception\NotiflyResolverException;

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
     * @expectedException Notifly\Exception\NotiflyResolverException
     */
    public function resolveInvalidRenderer()
    {
        $resolver = new \Notifly\Resolver('./tests/config');
        $resolver->getRenderer('invalid');
    }
}