<?php

namespace ICanBoogie\Binding\Render;

$hooks = Hooks::class . '::';

return [

	'ICanBoogie\Render\BasicTemplateResolver::alter' => $hooks . 'on_alter_template_resolver',
	'ICanBoogie\Render\EngineCollection::alter'      => $hooks . 'on_alter_engines'

];
