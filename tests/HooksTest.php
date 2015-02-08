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

class HooksTest extends \PHPUnit_Framework_TestCase
{
	static private $app;

	static public function setupBeforeClass()
	{
		self::$app = \ICanBoogie\app();
	}

	public function test_get_template_engines()
	{
		$template_engines = self::$app->template_engines;
		$this->assertInstanceOf('ICanBoogie\Render\EngineCollection', $template_engines);
		$this->assertSame($template_engines, self::$app->template_engines);
	}

	public function test_get_template_resolver()
	{
		$template_resolver = self::$app->template_resolver;
		$this->assertInstanceOf('ICanBoogie\Binding\Render\ApplicationTemplateResolver', $template_resolver);
		$this->assertSame($template_resolver, self::$app->template_resolver);
	}

	public function test_get_renderer()
	{
		$renderer = self::$app->renderer;
		$this->assertInstanceOf('ICanBoogie\Render\Renderer', $renderer);
		$this->assertSame($renderer, self::$app->renderer);
	}

	public function test_render()
	{
		$target_or_options = uniqid();
		$additional_options = [ uniqid() ];
		$rc = uniqid();

		$renderer = $this
			->getMockBuilder('ICanBoogie\Render\Renderer')
			->disableOriginalConstructor()
			->setMethods([ 'render' ])
			->getMock();
		$renderer
			->expects($this->once())
			->method('render')
			->with($target_or_options, $additional_options)
			->willReturn($rc);

		$app = $this
			->getMockBuilder('ICanBoogie\Core')
			->disableOriginalConstructor()
			->setMethods([ 'get_renderer' ])
			->getMock();
		$app
			->expects($this->once())
			->method('get_renderer')
			->willReturn($renderer);

		Hooks::render($app, $target_or_options, $additional_options);
	}
}
