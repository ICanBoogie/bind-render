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
use ICanBoogie\Render;
use ICanBoogie\Render\EngineCollection;
use ICanBoogie\Render\Renderer;
use ICanBoogie\Render\TemplateResolver;
use function ICanBoogie\app;
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
	static public function on_alter_template_resolver(TemplateResolver\AlterEvent $event, TemplateResolver $target): void
	{
		$event->instance = new ApplicationTemplateResolver($event->instance, get_autoconfig()['app-paths']);
	}

	/**
	 * @param EngineCollection\AlterEvent $event
	 * @param EngineCollection $target
	 */
	static public function on_alter_engines(EngineCollection\AlterEvent $event, EngineCollection $target): void
	{
		foreach (app()->configs[RenderConfig::DERIVED_ENGINES] as $extension => $engine)
		{
			$target[$extension] = $engine;
		}
	}

	/*
	 * Prototypes
	 */

	/**
	 * Returns an engine collection.
	 *
	 * @return EngineCollection
	 */
	static public function get_template_engines(): EngineCollection
	{
		return Render\get_engines();
	}

	/**
	 * Returns a clone of the shared template resolver.
	 *
	 * @return TemplateResolver
	 */
	static public function get_template_resolver(): TemplateResolver
	{
		return clone Render\get_template_resolver();
	}

	/**
	 * Returns a clone of the shared renderer.
	 *
	 * @return Renderer
	 */
	static public function get_renderer(): Renderer
	{
		return clone Render\get_renderer();
	}

	/**
	 * Renders a template.
	 *
	 * @param Application $app
	 * @param mixed $target_or_options
	 * @param array $additional_options
	 *
	 * @return string|null
	 */
	static public function render(Application $app, $target_or_options, array $additional_options = []): ?string
	{
		return $app->renderer->render($target_or_options, $additional_options);
	}
}
