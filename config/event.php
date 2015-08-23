<?php

namespace ICanBoogie\Binding\Render;

use ICanBoogie;

$hooks = Hooks::class . '::';

return [

	ICanBoogie\Render\BasicTemplateResolver::class . '::alter' => $hooks . 'alter_template_resolver'

];
