<?php

/**
 * Class LoaderTest
 *
 * @covers \Panday\Config\Loader
 */
class LoaderTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers \Panday\Config\Loader::supports
     * @test
     */
    public function supportsTrue()
    {
        $locatorMock = $this->getMock('\Symfony\Component\Config\FileLocator');
        $loader = new \Panday\Config\Loader($locatorMock);
        $this->assertTrue($loader->supports('ymlfile.yml'));
    }

    /**
     * @covers \Panday\Config\Loader::supports
     * @test
     */
    public function supportsFalse()
    {
        $locatorMock = $this->getMock('\Symfony\Component\Config\FileLocator');
        $loader = new \Panday\Config\Loader($locatorMock);
        $this->assertFalse($loader->supports('xmlfile.xml'));
    }

    /**
     * @covers \Panday\Config\Loader::load
     * @test
     */
    public function loadMethodReturnsCorrectDataKeys()
    {
        $locatorMock = $this->getMock('\Symfony\Component\Config\FileLocator');
        $loader = new \Panday\Config\Loader($locatorMock);

        $result = $loader->load('./tests/utils/config/.panday.yml');
        $this->assertArrayHasKey('renderer', $result);
        $this->assertArrayHasKey('driver', $result);
    }
}
