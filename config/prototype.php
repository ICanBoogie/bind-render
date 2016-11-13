<?php

namespace ICanBoogie\Binding\Render;

use ICanBoogie;

$hooks = Hooks::class . '::';

return [

	ICanBoogie\Application::class . '::lazy_get_template_engines' => $hooks . 'get_template_engines',
	ICanBoogie\Application::class . '::lazy_get_template_resolver' => $hooks . 'get_template_resolver',
	ICanBoogie\Application::class . '::lazy_get_renderer' => $hooks . 'get_renderer',
	ICanBoogie\Application::class . '::render' => $hooks . 'render'

];
