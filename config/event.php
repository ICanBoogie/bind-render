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

/**
 * @uses Hooks::on_alter_template_resolver()
 * @uses Hooks::on_alter_engines()
 */
return [

	'ICanBoogie\Render\BasicTemplateResolver::alter' => $hooks . 'on_alter_template_resolver',
	'ICanBoogie\Render\EngineCollection::alter'      => $hooks . 'on_alter_engines'

];
