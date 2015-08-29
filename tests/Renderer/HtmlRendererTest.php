<?php

namespace Notifly\Tests\Renderer;

use Notifly\Renderer\HtmlRenderer;

/**
 * Class LoaderTest
 *
 * @covers \Notifly\Renderer\HtmlRenderer
 */
class HtmlRendererTest extends \PHPUnit_Framework_TestCase
{
    protected $types;

    public function setUp()
    {
        $this->types = $types = ['info', 'error', 'success', 'warning'];

        parent::setUp();
    }

    /**
     * @covers \Notifly\Renderer\HtmlRenderer::render
     * @test
     */
    public function rendersCorrectly()
    {
        $renderer = new HtmlRenderer();

        $notifications   = [];
        $notifications[] = 'some text';

        // Test it contains notification's text
        $html = $renderer->render($notifications);
        $this->assertContains('some text', $html);

        // Test that type of notification is set to info by default
        $this->assertContains('alert-info', $html);
    }

    /**
     * @covers \Notifly\Renderer\HtmlRenderer::renderInfo
     * @covers \Notifly\Renderer\HtmlRenderer::renderError
     * @covers \Notifly\Renderer\HtmlRenderer::renderWarning
     * @covers \Notifly\Renderer\HtmlRenderer::renderSuccess
     * @test
     */
    public function supportedTypesAreSupportedByMatchingMethods()
    {
        $renderer     = new HtmlRenderer();
        $notification = 'text text';

        foreach ($this->types as $type) {
            $methodName = 'render' . ucwords($type);
            $html       = $renderer->$methodName($notification);

            $this->assertContains('alert-' . $type, $html);
        }
    }

    /**
     * @covers \Notifly\Renderer\HtmlRenderer::renderInfo
     * @covers \Notifly\Renderer\HtmlRenderer::renderError
     * @covers \Notifly\Renderer\HtmlRenderer::renderWarning
     * @covers \Notifly\Renderer\HtmlRenderer::renderSuccess
     * @test
     */
    public function renderMethodsSupportParameterToBeArray()
    {
        $renderer = new HtmlRenderer();

        $notifications = [
            'first',
            'second',
            'third',
        ];

        foreach ($this->types as $type) {
            $methodName = 'render' . ucwords($type);

            $html = $renderer->$methodName($notifications);

            // assert it contains all elements.
            $this->assertContains('first', $html);
            $this->assertContains('second', $html);
            $this->assertContains('third', $html);
        }
    }

    /**
     * @throws \Notifly\Exception\MessageTypeUnsupported
     */
    public function throwsMessageTypeUnsupported()
    {
        $renderer = new HtmlRenderer();

        $renderer->render(['test'], 'unsupported');
    }

}
