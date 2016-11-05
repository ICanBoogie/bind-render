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

use ICanBoogie\Core;
use ICanBoogie\Render;
use ICanBoogie\Render\EngineCollection;
use ICanBoogie\Render\Renderer;
use ICanBoogie\Render\TemplateResolver;

use function ICanBoogie\get_autoconfig;

class Hooks
{
	/*
	 * Events
	 */

	/**
	 * Decorates the template resolver with an {@link ApplicationTemplateResolver} instance.
	 *
	 * @param TemplateResolver\AlterEvent $event
	 * @param TemplateResolver $target
	 */
	static public function alter_template_resolver(TemplateResolver\AlterEvent $event, TemplateResolver $target)
	{
		$event->instance = new ApplicationTemplateResolver($event->instance, get_autoconfig()['app-paths']);
	}

	/*
	 * Prototypes
	 */

	/**
	 * Returns an engine collection.
	 *
	 * @return EngineCollection
	 */
	static public function get_template_engines()
	{
		return Render\get_engines();
	}

	/**
	 * Returns a clone of the shared template resolver.
	 *
	 * @return TemplateResolver
	 */
	static public function get_template_resolver()
	{
		return clone Render\get_template_resolver();
	}

	/**
	 * Returns a clone of the shared renderer.
	 *
	 * @return Renderer
	 */
	static public function get_renderer()
	{
		return clone Render\get_renderer();
	}

	/**
	 * Renders a template.
	 *
	 * @param Core|CoreBindings $app
	 * @param mixed $target_or_options
	 * @param array $additional_options
	 *
	 * @return mixed
	 */
	static public function render(Core $app, $target_or_options, array $additional_options = [])
	{
		return $app->renderer->render($target_or_options, $additional_options);
	}
}
