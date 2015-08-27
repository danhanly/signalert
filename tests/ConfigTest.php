<?php


use Notifly\Config;

class ConfigTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function loadConfiguration()
    {
        $config = new Config();
        $this->assertInstanceOf(Config::class, $config);

    }
}
