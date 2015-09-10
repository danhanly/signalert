<?php

namespace Notifly\Tests;

/**
 * Class LoaderTest
 *
 * @covers \Notifly\Config\Loader
 */
class LoaderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers \Notifly\Config\Loader::supports
     * @test
     */
    public function supportsTrue()
    {
        $locatorMock = $this->getMock('\Symfony\Component\Config\FileLocator');
        $loader = new \Notifly\Config\Loader($locatorMock);
        $this->assertTrue($loader->supports('ymlfile.yml'));
    }

    /**
     * @covers \Notifly\Config\Loader::supports
     * @test
     */
    public function supportsFalse()
    {
        $locatorMock = $this->getMock('\Symfony\Component\Config\FileLocator');
        $loader = new \Notifly\Config\Loader($locatorMock);
        $this->assertFalse($loader->supports('xmlfile.xml'));
    }

    /**
     * @covers \Notifly\Config\Loader::load
     * @test
     */
    public function loadMethodReturnsCorrectDataKeys()
    {
        $locatorMock = $this->getMock('\Symfony\Component\Config\FileLocator');
        $loader = new \Notifly\Config\Loader($locatorMock);

        $result = $loader->load('./tests/utils/config/.notifly.yml');
        $this->assertArrayHasKey('renderer', $result);
        $this->assertArrayHasKey('driver', $result);
    }
}
