<?php

/**
 * Class SessionDriverTest
 *
 * @covers \Notifly\Storage\SessionDriver
 */
class SessionDriverTest extends PHPUnit_Framework_TestCase
{
    /**
     * Clean Up Session for the Tests
     */
    public function setUp()
    {
        unset($_SESSION);
    }

    /**
     * @covers \Notifly\Storage\SessionDriver::store
     * @test
     */
    public function storeAMessageSuccessfully()
    {
        $driver = new \Notifly\Storage\SessionDriver();
        $this->assertTrue($driver->store('test message', 'test_bucket'));
    }

    /**
     * @covers \Notifly\Storage\SessionDriver::store
     * @test
     */
    public function tryToStoreIdenticalMessage()
    {
        $driver = new \Notifly\Storage\SessionDriver();
        $driver->store('test message', 'test_bucket');
        $this->assertFalse($driver->store('test message', 'test_bucket'));
    }

    /**
     * @covers \Notifly\Storage\SessionDriver::fetch
     * @test
     */
    public function fetchMessagesFromBucket()
    {
        $driver = new \Notifly\Storage\SessionDriver();
        $driver->store('test message', 'test_bucket');
        $this->assertContains('test message', $driver->fetch('test_bucket', false));
    }

    /**
     * @covers \Notifly\Storage\SessionDriver::fetch
     * @test
     */
    public function fetchAndFlushMessagesFromBucket()
    {
        $driver = new \Notifly\Storage\SessionDriver();
        $driver->store('test message', 'test_bucket');
        $this->assertContains('test message', $driver->fetch('test_bucket'));
    }

    /**
     * @covers \Notifly\Storage\SessionDriver::flush
     * @test
     */
    public function flushMessagesFromBucket()
    {
        $driver = new \Notifly\Storage\SessionDriver();
        $driver->store('test message', 'test_bucket');
        $this->assertContains('test message', $driver->fetch('test_bucket', false));
        $this->assertTrue($driver->flush('test_bucket'));
        $this->assertNotContains('test message', $driver->fetch('test_bucket', false));
    }

    /**
     * @covers \Notifly\Storage\SessionDriver::flush
     * @test
     */
    public function flushEmptyBucket()
    {
        $driver = new \Notifly\Storage\SessionDriver();
        $this->assertFalse($driver->flush('test_bucket'));
    }
}
