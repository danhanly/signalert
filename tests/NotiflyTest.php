<?php

use Notifly\Notifly;

class NotiflyTest extends PHPUnit_Framework_TestCase
{
    /**
     * Ensure the constructor is chainable
     *
     * @test
     */
    public function chainableConstructor()
    {
        $notifly = new Notifly();
        $this->assertInstanceOf(Notifly::class, $notifly);
    }
}