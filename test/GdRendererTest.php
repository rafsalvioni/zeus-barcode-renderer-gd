<?php

namespace ZeusTest\Barcode\Renderer;

/**
 * Image GD Renderer Test
 *
 * @author Rafael M. Salvioni
 */
class GdRendererTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @test
     */
    public function renderTest()
    {
        $hashTest = 'eca05574539af4d3c80c3f18a1fb81d845d54182';
        \ob_start();
        $bc = new \Zeus\Barcode\Upc\Ean13('98763547908', false);
        $bc->scale(5);
        $renderer = new \Zeus\Barcode\Renderer\GdRenderer();
        $renderer->offsetTop = 20;
        \imagepng($bc->draw($renderer)->getResource());
        $output = \ob_get_contents();
        $hash = \sha1($output);
        \ob_end_clean();
        $this->assertEquals($hashTest, $hash);
    }
}
