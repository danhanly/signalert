<?php
use Notifly\Notifly;

/**
 * Class BootstrapRendererTest
 *
 * @covers \Notifly\Renderer\BootstrapRenderer
 */
class BootstrapRendererTest extends PHPUnit_Framework_TestCase
{
    protected $testMessage = 'test message';

    /**
     * @covers \Notifly\Renderer\BootstrapRenderer::render
     * @test
     */
    public function renderAMessage()
    {
        $renderer = new \Notifly\Renderer\BootstrapRenderer();
        $result = $renderer->render([$this->testMessage], 'error');
        $this->assertInternalType('string', $result);
        $this->assertContains($this->testMessage, $result);
    }

    /**
     * @covers \Notifly\Renderer\BootstrapRenderer::render
     * @expectedException \Notifly\Exception\NotiflyRenderTypeUnsupported
     * @test
     */
    public function renderUnsupportedTypeMessage()
    {
        $renderer = new \Notifly\Renderer\BootstrapRenderer();
        $renderer->render([$this->testMessage], 'invalid');
    }

    /**
     * @covers \Notifly\Renderer\BootstrapRenderer::render
     * @test
     */
    public function renderEmptyDataset()
    {
        $renderer = new \Notifly\Renderer\BootstrapRenderer();
        $result = $renderer->render([], 'info');
        $this->assertEmpty($result);
    }
}