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
use ICanBoogie\Render\TemplateResolverDecorator;
use ICanBoogie\Render\TemplateResolverDecoratorTrait;
use ICanBoogie\Render\TemplateResolverTrait;

/**
 * Decorates a template resolver and adds support for the application paths.
 *
 * @package ICanBoogie\Binding\Render
 */
class ApplicationTemplateResolver implements TemplateResolverDecorator
{
	use TemplateResolverTrait;
	use TemplateResolverDecoratorTrait;

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
		$this->template_resolver = $template_resolver;
		$this->paths = $this->expend_paths($paths);
	}

	/**
	 * @inheritdoc
	 */
	public function resolve($name, array $extensions, &$tried = [])
	{
		if (strpos($name, '//') === 0)
		{
			return $this->resolve_from_app(substr($name, 2), $extensions, $tried);
		}

		$template = $this->resolve_from_app($name, $extensions, $tried);

		if ($template)
		{
			return $template;
		}

		return $this->template_resolver->resolve($name, $extensions, $tried);
	}

	/**
	 * Resolves a template name from the application paths.
	 *
	 * @param string $name
	 * @param array $extensions
	 * @param array $tried
	 *
	 * @return string|null
	 */
	protected function resolve_from_app($name, array $extensions, array &$tried)
	{
		return $this->resolve_path($this->resolve_tries($this->paths, $name, $extensions), $tried);
	}

	/**
	 * Expends application paths into template paths.
	 *
	 * **Note:** Paths that do not have a "templates" directory are discarded.
	 *
	 * @param array $paths
	 *
	 * @return array
	 */
	protected function expend_paths(array $paths)
	{
		$resolved_paths = [];

		foreach (array_reverse($paths) as $path)
		{
			$path .= 'templates' . DIRECTORY_SEPARATOR;

			if (file_exists($path))
			{
				$resolved_paths[] = $path;
			}
		}

		return $resolved_paths;
	}
}
