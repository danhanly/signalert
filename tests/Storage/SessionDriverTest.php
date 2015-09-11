<?php

/**
 * Class SessionDriverTest
 *
 * @covers \Panday\Storage\SessionDriver
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
     * @covers \Panday\Storage\SessionDriver::store
     * @test
     */
    public function storeAMessageSuccessfully()
    {
        $driver = new \Panday\Storage\SessionDriver();
        $this->assertTrue($driver->store('test message', 'test_bucket'));
    }

    /**
     * @covers \Panday\Storage\SessionDriver::store
     * @test
     */
    public function tryToStoreIdenticalMessage()
    {
        $driver = new \Panday\Storage\SessionDriver();
        $driver->store('test message', 'test_bucket');
        $this->assertFalse($driver->store('test message', 'test_bucket'));
    }

    /**
     * @covers \Panday\Storage\SessionDriver::fetch
     * @test
     */
    public function fetchMessagesFromBucket()
    {
        $driver = new \Panday\Storage\SessionDriver();
        $driver->store('test message', 'test_bucket');
        $this->assertContains('test message', $driver->fetch('test_bucket', false));
    }

    /**
     * @covers \Panday\Storage\SessionDriver::fetch
     * @test
     */
    public function fetchAndFlushMessagesFromBucket()
    {
        $driver = new \Panday\Storage\SessionDriver();
        $driver->store('test message', 'test_bucket');
        $this->assertContains('test message', $driver->fetch('test_bucket'));
    }

    /**
     * @covers \Panday\Storage\SessionDriver::flush
     * @test
     */
    public function flushMessagesFromBucket()
    {
        $driver = new \Panday\Storage\SessionDriver();
        $driver->store('test message', 'test_bucket');
        $this->assertContains('test message', $driver->fetch('test_bucket', false));
        $this->assertTrue($driver->flush('test_bucket'));
        $this->assertNotContains('test message', $driver->fetch('test_bucket', false));
    }

    /**
     * @covers \Panday\Storage\SessionDriver::flush
     * @test
     */
    public function flushEmptyBucket()
    {
        $driver = new \Panday\Storage\SessionDriver();
        $this->assertFalse($driver->flush('test_bucket'));
    }
}
