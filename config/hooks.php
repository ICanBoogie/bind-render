<?php

namespace ICanBoogie\Binding\Render;

$hooks = __NAMESPACE__ . '\Hooks::';

return [

	'events' => [

		'ICanBoogie\Render\BasicTemplateResolver::alter' => $hooks . 'alter_template_resolver'

	],

	'prototypes' => [

		'ICanBoogie\Core::lazy_get_template_engines' => $hooks . 'get_template_engines',
		'ICanBoogie\Core::lazy_get_template_resolver' => $hooks . 'get_template_resolver',
		'ICanBoogie\Core::lazy_get_renderer' => $hooks . 'get_renderer',
		'ICanBoogie\Core::render' => $hooks . 'render'

	]

];
