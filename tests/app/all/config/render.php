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

return [

	RenderConfig::ENGINES => [

		'.one' => function () {

			return 'should-no-be-this-one';

		},

		'.two' => function () {

			return 'two';

		}

	]

];
