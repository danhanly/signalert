<?php

/**
 * Class ResolverTest
 *
 * @covers \Notifly\Resolver
 */
class ResolverTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     * @covers \Notifly\Resolver::getRenderer
     */
    public function resolveDefaultRenderer()
    {
        $resolver = new \Notifly\Resolver();
        $renderer = $resolver->getRenderer('error');

        $this->assertInstanceOf('\Notifly\Renderer\Error', $renderer);
    }

    /**
     * @test
     * @covers \Notifly\Resolver::getDriver
     */
    public function resolveDefaultDriver()
    {
        $resolver = new \Notifly\Resolver();
        $renderer = $resolver->getDriver();

        $this->assertInstanceOf('Notifly\Storage\SessionDriver', $renderer);
    }

    /**
     * @test
     * @expectedException Notifly\Exception\NotiflyResolverException
     * @covers \Notifly\Resolver::getRenderer
     */
    public function resolveInvalidRenderer()
    {
        $resolver = new \Notifly\Resolver('./tests/utils/config');
        $resolver->getRenderer('invalid');
    }

    /**
     * @test
     * @expectedException Notifly\Exception\NotiflyResolverException
     * @covers \Notifly\Resolver::getRenderer
     */
    public function resolveInvalidDriver()
    {
        $resolver = new \Notifly\Resolver('./tests/utils/config');
        $resolver->getDriver();
    }
}