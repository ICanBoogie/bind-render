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

use ICanBoogie\Render\TemplateResolver;

/**
 * Decorates a template resolver and adds support for the application paths.
 *
 * @package ICanBoogie\Binding\Render
 */
class ApplicationTemplateResolver implements TemplateResolver
{
	/**
	 * Original template resolver.
	 *
	 * @var TemplateResolver
	 */
	private $component;

	/**
	 * Application paths.
	 *
	 * @var array
	 */
	private $paths;

	/**
	 * @param TemplateResolver $template_resolver
	 * @param array $paths Application paths.
	 */
	public function __construct(TemplateResolver $template_resolver, array $paths)
	{
		$this->component = $template_resolver;
		$this->paths = array_reverse($paths);

		foreach ($paths as $path)
		{
			$template_resolver->add_path($path . 'templates');
		}
	}

	/**
	 * @inheritdoc
	 */
	public function resolve($name, array $extensions, &$tries = [ ])
	{
		if (strpos($name, '//') === 0)
		{
			$template = $this->resolve_from_app(substr($name, 2), $extensions, $tries);

			if ($template)
			{
				return $template;
			}
		}

		return $this->component->resolve($name, $extensions, $tries);
	}

	/**
	 * Resolves a name from the application paths.
	 *
	 * @param $name
	 * @param $extensions
	 * @param $tries
	 *
	 * @return null|string
	 */
	protected function resolve_from_app($name, array $extensions, &$tries)
	{
		if (pathinfo($name, PATHINFO_EXTENSION))
		{
			foreach ($this->paths as $path)
			{
				$try = $path . $name;
				$tries[] = $try;

				if (file_exists($try))
				{
					return $try;
				}
			}

			return null;
		}

		foreach ($this->paths as $path)
		{
			foreach ($extensions as $extension)
			{
				$try = $path . $name . $extension;
				$tries[] = $try;

				if (file_exists($try))
				{
					return $try;
				}
			}
		}

		return null;
	}

	/**
	 * @inheritdoc
	 */
	public function add_path($path, $weight = 0)
	{
		return $this->component->add_path($path, $weight);
	}

	/**
	 * @inheritdoc
	 */
	public function get_paths()
	{
		return $this->component->get_paths();
	}
}
