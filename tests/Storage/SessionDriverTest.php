<?php

/**
 * Class SessionDriverTest
 *
 * @covers \Signalert\Storage\SessionDriver
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
     * @covers \Signalert\Storage\SessionDriver::store
     * @test
     */
    public function storeAMessageSuccessfully()
    {
        $driver = new \Signalert\Storage\SessionDriver();
        $this->assertTrue($driver->store('test message', 'test_bucket'));
    }

    /**
     * @covers \Signalert\Storage\SessionDriver::store
     * @test
     */
    public function tryToStoreIdenticalMessage()
    {
        $driver = new \Signalert\Storage\SessionDriver();
        $driver->store('test message', 'test_bucket');
        $this->assertFalse($driver->store('test message', 'test_bucket'));
    }

    /**
     * @covers \Signalert\Storage\SessionDriver::fetch
     * @test
     */
    public function fetchMessagesFromBucket()
    {
        $driver = new \Signalert\Storage\SessionDriver();
        $driver->store('test message', 'test_bucket');
        $this->assertContains('test message', $driver->fetch('test_bucket', false));
    }

    /**
     * @covers \Signalert\Storage\SessionDriver::fetch
     * @test
     */
    public function fetchAndFlushMessagesFromBucket()
    {
        $driver = new \Signalert\Storage\SessionDriver();
        $driver->store('test message', 'test_bucket');
        $this->assertContains('test message', $driver->fetch('test_bucket'));
    }

    /**
     * @covers \Signalert\Storage\SessionDriver::flush
     * @test
     */
    public function flushMessagesFromBucket()
    {
        $driver = new \Signalert\Storage\SessionDriver();
        $driver->store('test message', 'test_bucket');
        $this->assertContains('test message', $driver->fetch('test_bucket', false));
        $this->assertTrue($driver->flush('test_bucket'));
        $this->assertNotContains('test message', $driver->fetch('test_bucket', false));
    }

    /**
     * @covers \Signalert\Storage\SessionDriver::flush
     * @test
     */
    public function flushEmptyBucket()
    {
        $driver = new \Signalert\Storage\SessionDriver();
        $this->assertFalse($driver->flush('test_bucket'));
    }
}
