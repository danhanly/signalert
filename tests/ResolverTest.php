<?php

/**
 * Class ResolverTest
 *
 * @covers \Panday\Resolver
 */
class ResolverTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     * @covers \Panday\Resolver::getRenderer
     */
    public function resolveDefaultRenderer()
    {
        $resolver = new \Panday\Resolver();
        $renderer = $resolver->getRenderer();

        $this->assertInstanceOf('Panday\Renderer\BootstrapRenderer', $renderer);
    }

    /**
     * @test
     * @covers \Panday\Resolver::getDriver
     */
    public function resolveDefaultDriver()
    {
        $resolver = new \Panday\Resolver();
        $renderer = $resolver->getDriver();

        $this->assertInstanceOf('Panday\Storage\SessionDriver', $renderer);
    }

    /**
     * @test
     * @expectedException \Panday\Exception\PandayResolverException
     * @covers \Panday\Resolver::getRenderer
     */
    public function resolveInvalidRenderer()
    {
        $resolver = new \Panday\Resolver('./tests/utils/config');
        $resolver->getRenderer('invalid');
    }

    /**
     * @test
     * @expectedException \Panday\Exception\PandayResolverException
     * @covers \Panday\Resolver::getRenderer
     */
    public function resolveInvalidDriver()
    {
        $resolver = new \Panday\Resolver('./tests/utils/config');
        $resolver->getDriver();
    }
}