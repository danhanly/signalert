<?php

/**
 * Class ResolverTest
 *
 * @covers \Signalert\Resolver
 */
class ResolverTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     * @covers \Signalert\Resolver::getRenderer
     */
    public function resolveDefaultRenderer()
    {
        $resolver = new \Signalert\Resolver();
        $renderer = $resolver->getRenderer();

        $this->assertInstanceOf('Signalert\Renderer\BootstrapRenderer', $renderer);
    }

    /**
     * @test
     * @covers \Signalert\Resolver::getDriver
     */
    public function resolveDefaultDriver()
    {
        $resolver = new \Signalert\Resolver();
        $renderer = $resolver->getDriver();

        $this->assertInstanceOf('Signalert\Storage\SessionDriver', $renderer);
    }

    /**
     * @test
     * @expectedException \Signalert\Exception\SignalertResolverException
     * @covers \Signalert\Resolver::getRenderer
     */
    public function resolveInvalidRenderer()
    {
        $resolver = new \Signalert\Resolver('./tests/utils/config');
        $resolver->getRenderer('invalid');
    }

    /**
     * @test
     * @expectedException \Signalert\Exception\SignalertResolverException
     * @covers \Signalert\Resolver::getRenderer
     */
    public function resolveInvalidDriver()
    {
        $resolver = new \Signalert\Resolver('./tests/utils/config');
        $resolver->getDriver();
    }
}