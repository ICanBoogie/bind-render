<?php

namespace ICanBoogie\Binding\Render;

$hooks = Hooks::class . '::';

return [

	'events' => [

		'ICanBoogie\Render\BasicTemplateResolver::alter' => $hooks . 'alter_template_resolver'

	]

];
