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

/**
 * Configuration for the `icanboogie/render` package.
 */
final class RenderConfig
{
	const DERIVED_ENGINES = 'render_engines';
	const ENGINES = 'engines';

	/**
	 * Nope
	 */
	private function __construct() // @codeCoverageIgnoreStart
	{

	} // @codeCoverageIgnoreEnd

	/**
	 * @param array $fragments
	 *
	 * @return array
	 */
	static public function synthesise_engines(array $fragments)
	{
		$engines = [];

		foreach ($fragments as $fragment)
		{
			if (empty($fragment[self::ENGINES]))
			{
				continue; // @codeCoverageIgnore
			}

			$engines[] = $fragment[self::ENGINES];
		}

		return array_merge(...$engines);
	}
}
