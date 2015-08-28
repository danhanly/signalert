<?php

use Notifly\Notifly;

class NotiflyTest extends PHPUnit_Framework_TestCase
{
    /**
     * Ensure the Session is awake
     */
    public function setUp()
    {
        @session_start();
    }

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

    /**
     * @test
     */
    public function storageAndRetrieval()
    {
        $notifly = new Notifly();
        $notifly->store('test message', 'test_bucket');

        $messages = $notifly->fetch('test_bucket');

        $this->assertContains('test message', $messages);
    }
}