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

use ICanBoogie\Render\EngineCollection;
use ICanBoogie\Render\Renderer;
use ICanBoogie\Render\TemplateResolver;

/**
 * {@link \ICanBoogie\Core} prototype bindings.
 *
 * @property EngineCollection $template_engines
 * @property TemplateResolver $template_resolver
 * @property Renderer $renderer
 */
trait CoreBindings
{
	/**
	 * @see \ICanBoogie\Binding\Render\Hooks::get_template_engines
	 *
	 * @return EngineCollection
	 */
	protected function lazy_get_template_engines()
	{
		return parent::lazy_get_template_engines();
	}

	/**
	 * @see \ICanBoogie\Binding\Render\Hooks::get_template_resolver
	 *
	 * @return TemplateResolver
	 */
	protected function lazy_get_template_resolver()
	{
		return parent::lazy_get_template_resolver();
	}

	/**
	 * @see \ICanBoogie\Binding\Render\Hooks::get_renderer
	 *
	 * @return Renderer
	 */
	protected function lazy_get_renderer()
	{
		return parent::lazy_get_renderer();
	}

	/**
	 * Renders a template.
	 *
	 * @see \ICanBoogie\Binding\Render\Hooks::render
	 *
	 * @param mixed $target_or_options
	 * @param array $additional_options
	 *
	 * @return mixed
	 */
	public function render($target_or_options, array $additional_options = [])
	{
		return parent::render($target_or_options, $additional_options);
	}
}
