<?php

/*
 * This file is part of the ICanBoogie package.
 *
 * (c) Olivier Laviale <olivier.laviale@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Test\ICanBoogie\Binding\Render;

use ICanBoogie\Application;
use ICanBoogie\Render\Renderer;
use ICanBoogie\Render\RenderOptions;
use PHPUnit\Framework\TestCase;

use function ICanBoogie\app;

class HooksTest extends TestCase
{
    private Application $app;

    protected function setUp(): void
    {
        parent::setUp();

        $this->app = app();
    }

    public function test_render()
    {
        $actual = $this->app->render(
            new SampleContent("Hello world!"),
            new RenderOptions( template: '_content')
        );

        $this->assertEquals("PHP RENDERED: Hello world!", $actual);
    }
}
