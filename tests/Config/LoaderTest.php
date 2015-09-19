<?php

/**
 * Class LoaderTest
 *
 * @covers \Signalert\Config\Loader
 */
class LoaderTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers \Signalert\Config\Loader::supports
     * @test
     */
    public function supportsTrue()
    {
        $locatorMock = $this->getMock('\Symfony\Component\Config\FileLocator');
        $loader = new \Signalert\Config\Loader($locatorMock);
        $this->assertTrue($loader->supports('ymlfile.yml'));
    }

    /**
     * @covers \Signalert\Config\Loader::supports
     * @test
     */
    public function supportsFalse()
    {
        $locatorMock = $this->getMock('\Symfony\Component\Config\FileLocator');
        $loader = new \Signalert\Config\Loader($locatorMock);
        $this->assertFalse($loader->supports('xmlfile.xml'));
    }

    /**
     * @covers \Signalert\Config\Loader::load
     * @test
     */
    public function loadMethodReturnsCorrectDataKeys()
    {
        $locatorMock = $this->getMock('\Symfony\Component\Config\FileLocator');
        $loader = new \Signalert\Config\Loader($locatorMock);

        $result = $loader->load('./tests/utils/config/.signalert.yml');
        $this->assertArrayHasKey('renderer', $result);
        $this->assertArrayHasKey('driver', $result);
    }
}
