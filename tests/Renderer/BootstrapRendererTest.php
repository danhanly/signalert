<?php
use Panday\Panday;

/**
 * Class BootstrapRendererTest
 *
 * @covers \Panday\Renderer\BootstrapRenderer
 */
class BootstrapRendererTest extends PHPUnit_Framework_TestCase
{
    protected $testMessage = 'test message';

    /**
     * @covers \Panday\Renderer\BootstrapRenderer::render
     * @test
     */
    public function renderAMessage()
    {
        $renderer = new \Panday\Renderer\BootstrapRenderer();
        $result = $renderer->render([$this->testMessage], 'error');
        $this->assertInternalType('string', $result);
        $this->assertContains($this->testMessage, $result);
    }

    /**
     * @covers \Panday\Renderer\BootstrapRenderer::render
     * @expectedException \Panday\Exception\PandayRenderTypeUnsupported
     * @test
     */
    public function renderUnsupportedTypeMessage()
    {
        $renderer = new \Panday\Renderer\BootstrapRenderer();
        $renderer->render([$this->testMessage], 'invalid');
    }

    /**
     * @covers \Panday\Renderer\BootstrapRenderer::render
     * @test
     */
    public function renderEmptyDataset()
    {
        $renderer = new \Panday\Renderer\BootstrapRenderer();
        $result = $renderer->render([], 'info');
        $this->assertEmpty($result);
    }
}