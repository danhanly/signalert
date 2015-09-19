<?php

use Signalert\Signalert;

/**
 * Class SignalertTest
 *
 * @covers \Signalert\Signalert
 */
class SignalertTest extends PHPUnit_Framework_TestCase
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
     * @covers \Signalert\Signalert::__construct
     * @test
     */
    public function chainableConstructor()
    {
        // Instantiate the object
        $signalert = new Signalert();
        // Check the returned class is correct
        $this->assertInstanceOf('Signalert\Signalert', $signalert);
    }

    /**
     * @covers \Signalert\Signalert::<public>
     * @test
     */
    public function storageAndRetrieval()
    {
        // Create the notifications class
        $signalert = new Signalert();
        // Store the test message beneath the a specific bucket
        $signalert->store('test message', 'test_bucket');
        // Fetch all messages from the bucket
        $messages = $signalert->fetch('test_bucket');
        // Validate output
        $this->assertContains('test message', $messages);
    }

    /**
     * Matching Methods should be rejected
     *
     * @covers \Signalert\Signalert::store
     * @test
     */
    public function storeMatchingMessage()
    {
        // Create the notifications class
        $signalert = new Signalert();
        // Store the test message beneath the a specific bucket
        $signalert->store('test message', 'test_bucket');
        // Try to store the message once more
        $success = $signalert->store('test message', 'test_bucket');
        // Ensure it's rejected as expected
        $this->assertFalse($success);
    }

    /**
     * Matching Methods should be rejected
     *
     * @covers \Signalert\Signalert::render
     * @test
     */
    public function renderResult()
    {
        // Create the notifications class
        $signalert = new Signalert();
        // Store the test message beneath the a specific bucket
        $signalert->store('test message', 'test_bucket');
        // Render the message
        $renderResult = $signalert->render('test_bucket', 'error');
        // Ensure it's rejected as expected
        $this->assertContains('test message', $renderResult);
    }
}