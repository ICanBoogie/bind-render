<?php

/*
 * This file is part of the ICanBoogie package.
 *
 * (c) Olivier Laviale <olivier.laviale@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ICanBoogie\Binding\Render;

use ICanBoogie\Application;
use ICanBoogie\Render\EngineCollection;
use ICanBoogie\Render\Renderer;
use PHPUnit\Framework\TestCase;

use function ICanBoogie\app;
use function ICanBoogie\Render\get_engines;

class HooksTest extends TestCase
{
    private static $app;

    public static function setupBeforeClass(): void
    {
        self::$app = app();
    }

    public function test_get_template_engines()
    {
        $template_engines = self::$app->template_engines;
        $this->assertInstanceOf(EngineCollection::class, $template_engines);
        $this->assertSame($template_engines, self::$app->template_engines);
    }

    public function test_get_template_resolver()
    {
        $template_resolver = self::$app->template_resolver;
        $this->assertInstanceOf(ApplicationTemplateResolver::class, $template_resolver);
        $this->assertSame($template_resolver, self::$app->template_resolver);
    }

    public function test_get_renderer()
    {
        $renderer = self::$app->renderer;
        $this->assertInstanceOf(Renderer::class, $renderer);
        $this->assertSame($renderer, self::$app->renderer);
    }

    public function test_render()
    {
        $target_or_options = uniqid();
        $additional_options = [ uniqid() ];
        $rc = uniqid();

        $renderer = $this
            ->getMockBuilder(Renderer::class)
            ->disableOriginalConstructor()
            ->setMethods([ 'render' ])
            ->getMock();
        $renderer
            ->expects($this->once())
            ->method('render')
            ->with($target_or_options, $additional_options)
            ->willReturn($rc);

        $app = $this
            ->getMockBuilder(Application::class)
            ->disableOriginalConstructor()
            ->setMethods([ 'get_renderer' ])
            ->getMock();
        $app
            ->expects($this->once())
            ->method('get_renderer')
            ->willReturn($renderer);

        /* @var $app Application */

        Hooks::render($app, $target_or_options, $additional_options);
    }

    public function test_config()
    {
        $config = app()->configs[RenderConfig::DERIVED_ENGINES];
        $keys = [ '.one', '.two', '.three' ];

        $this->assertSame($keys, array_keys($config));

        foreach ($keys as $key) {
            $this->assertSame(substr($key, 1), $config[$key]());
        }
    }

    public function test_engine_collection_should_include_engines_from_config()
    {
        $this->assertSame([ '.phtml', '.one', '.two', '.three' ], array_keys(iterator_to_array(get_engines())));
    }
}
