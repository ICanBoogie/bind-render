<?php

namespace ICanBoogie\Binding\Render;

use ICanBoogie;

$hooks = Hooks::class . '::';

return [

	ICanBoogie\Core::class . '::lazy_get_template_engines' => $hooks . 'get_template_engines',
	ICanBoogie\Core::class . '::lazy_get_template_resolver' => $hooks . 'get_template_resolver',
	ICanBoogie\Core::class . '::lazy_get_renderer' => $hooks . 'get_renderer',
	ICanBoogie\Core::class . '::render' => $hooks . 'render'

];
