<?php

use Panday\Panday;

/**
 * Class PandayTest
 *
 * @covers \Panday\Panday
 */
class PandayTest extends PHPUnit_Framework_TestCase
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
     * @covers \Panday\Panday::__construct
     * @test
     */
    public function chainableConstructor()
    {
        // Instantiate the object
        $panday = new Panday();
        // Check the returned class is correct
        $this->assertInstanceOf('Panday\Panday', $panday);
    }

    /**
     * @covers \Panday\Panday::<public>
     * @test
     */
    public function storageAndRetrieval()
    {
        // Create the notifications class
        $panday = new Panday();
        // Store the test message beneath the a specific bucket
        $panday->store('test message', 'test_bucket');
        // Fetch all messages from the bucket
        $messages = $panday->fetch('test_bucket');
        // Validate output
        $this->assertContains('test message', $messages);
    }

    /**
     * Matching Methods should be rejected
     *
     * @covers \Panday\Panday::store
     * @test
     */
    public function storeMatchingMessage()
    {
        // Create the notifications class
        $panday = new Panday();
        // Store the test message beneath the a specific bucket
        $panday->store('test message', 'test_bucket');
        // Try to store the message once more
        $success = $panday->store('test message', 'test_bucket');
        // Ensure it's rejected as expected
        $this->assertFalse($success);
    }

    /**
     * Matching Methods should be rejected
     *
     * @covers \Panday\Panday::render
     * @test
     */
    public function renderResult()
    {
        // Create the notifications class
        $panday = new Panday();
        // Store the test message beneath the a specific bucket
        $panday->store('test message', 'test_bucket');
        // Render the message
        $renderResult = $panday->render('test_bucket', 'error');
        // Ensure it's rejected as expected
        $this->assertContains('test message', $renderResult);
    }
}