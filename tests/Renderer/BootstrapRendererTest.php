<?php
use Signalert\Signalert;

/**
 * Class BootstrapRendererTest
 *
 * @covers \Signalert\Renderer\BootstrapRenderer
 */
class BootstrapRendererTest extends PHPUnit_Framework_TestCase
{
    protected $testMessage = 'test message';

    /**
     * @covers \Signalert\Renderer\BootstrapRenderer::render
     * @test
     */
    public function renderAMessage()
    {
        $renderer = new \Signalert\Renderer\BootstrapRenderer();
        $result = $renderer->render([$this->testMessage], 'error');
        $this->assertInternalType('string', $result);
        $this->assertContains($this->testMessage, $result);
    }

    /**
     * @covers \Signalert\Renderer\BootstrapRenderer::render
     * @test
     */
    public function renderUnsupportedTypeMessage()
    {
        $renderer = new \Signalert\Renderer\BootstrapRenderer();
        $result = $renderer->render([$this->testMessage], 'invalid');
        $this->assertContains('alert-info', $result);
    }

    /**
     * @covers \Signalert\Renderer\BootstrapRenderer::render
     * @test
     */
    public function renderEmptyDataset()
    {
        $renderer = new \Signalert\Renderer\BootstrapRenderer();
        $result = $renderer->render([], 'info');
        $this->assertEmpty($result);
    }

    /**
     * @covers \Signalert\Renderer\BootstrapRenderer::render
     * @test
     */
    public function renderMultipleMessages()
    {
        $renderer = new \Signalert\Renderer\BootstrapRenderer();
        $result = $renderer->render(['first message', 'second message'], 'alert');
        $this->assertContains('<br />', $result);
    }
}