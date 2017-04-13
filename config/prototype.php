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

$hooks = Hooks::class . '::';

return [

	'ICanBoogie\Application::lazy_get_template_engines'  => $hooks . 'get_template_engines',
	'ICanBoogie\Application::lazy_get_template_resolver' => $hooks . 'get_template_resolver',
	'ICanBoogie\Application::lazy_get_renderer'          => $hooks . 'get_renderer',
	'ICanBoogie\Application::render'                     => $hooks . 'render'

];
