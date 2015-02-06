<?php

/*
 * This file is part of the ICanBoogie package.
 *
 * (c) Olivier Laviale <olivier.laviale@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ICanBoogie\Bindings\Render;

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
}
