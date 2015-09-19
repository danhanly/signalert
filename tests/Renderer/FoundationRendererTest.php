<?php
use Signalert\Signalert;

/**
 * Class BootstrapRendererTest
 *
 * @covers \Signalert\Renderer\FoundationRenderer
 */
class FoundationRendererTest extends PHPUnit_Framework_TestCase
{
    protected $testMessage = 'test message';

    /**
     * @covers \Signalert\Renderer\FoundationRenderer::render
     * @test
     */
    public function renderAMessage()
    {
        $renderer = new \Signalert\Renderer\FoundationRenderer();
        $result = $renderer->render([$this->testMessage], 'alert');
        $this->assertInternalType('string', $result);
        $this->assertContains($this->testMessage, $result);
    }

    /**
     * @covers \Signalert\Renderer\FoundationRenderer::render
     * @expectedException \Signalert\Exception\SignalertRenderTypeUnsupported
     * @test
     */
    public function renderUnsupportedTypeMessage()
    {
        $renderer = new \Signalert\Renderer\FoundationRenderer();
        $renderer->render([$this->testMessage], 'invalid');
    }

    /**
     * @covers \Signalert\Renderer\FoundationRenderer::render
     * @test
     */
    public function renderEmptyDataset()
    {
        $renderer = new \Signalert\Renderer\FoundationRenderer();
        $result = $renderer->render([], 'info');
        $this->assertEmpty($result);
    }

    /**
     * @covers \Signalert\Renderer\FoundationRenderer::render
     * @test
     */
    public function renderASingleMessage()
    {
        $renderer = new \Signalert\Renderer\FoundationRenderer();
        $result = $renderer->render([$this->testMessage], 'alert');
        $this->assertNotContains('<br />', $result);
    }

    /**
     * @covers \Signalert\Renderer\FoundationRenderer::render
     * @test
     */
    public function renderMultipleMessages()
    {
        $renderer = new \Signalert\Renderer\FoundationRenderer();
        $result = $renderer->render(['first message', 'second message'], 'alert');
        $this->assertContains('<br />', $result);
    }
}