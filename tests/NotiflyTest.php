<?php

use Notifly\Notifly;

/**
 * Class NotiflyTest
 *
 * @covers \Notifly\Notifly
 */
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
     * @covers \Notifly\Notifly::__construct
     * @test
     */
    public function chainableConstructor()
    {
        // Instantiate the object
        $notifly = new Notifly();
        // Check the returned class is correct
        $this->assertInstanceOf(Notifly::class, $notifly);
    }

    /**
     * @covers \Notifly\Notifly::<public>
     * @test
     */
    public function storageAndRetrieval()
    {
        // Create the notifications class
        $notifly = new Notifly();
        // Store the test message beneath the a specific bucket
        $notifly->store('test message', 'test_bucket');
        // Fetch all messages from the bucket
        $messages = $notifly->fetch('test_bucket');
        // Validate output
        $this->assertContains('test message', $messages);
    }

    /**
     * Matching Methods should be rejected
     *
     * @covers \Notifly\Notifly::store
     * @test
     */
    public function storeMatchingMessage()
    {
        // Create the notifications class
        $notifly = new Notifly();
        // Store the test message beneath the a specific bucket
        $notifly->store('test message', 'test_bucket');
        // Try to store the message once more
        $success = $notifly->store('test message', 'test_bucket');
        // Ensure it's rejected as expected
        $this->assertFalse($success);
    }

    /**
     * Matching Methods should be rejected
     *
     * @covers \Notifly\Notifly::render
     * @test
     */
    public function renderResult()
    {
        // Create the notifications class
        $notifly = new Notifly();
        // Store the test message beneath the a specific bucket
        $notifly->store('test message', 'test_bucket');
        // Render the message
        $renderResult = $notifly->render('error', 'test_bucket');
        // Ensure it's rejected as expected
        $this->assertContains('test message', $renderResult);
    }
}