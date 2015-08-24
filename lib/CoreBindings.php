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

use ICanBoogie\Render\EngineCollection;
use ICanBoogie\Render\Renderer;
use ICanBoogie\Render\TemplateResolver;

/**
 * {@link \ICanBoogie\Core} prototype bindings.
 *
 * @method string render($target_or_options, array $additional_options = [])
 *
 * @property EngineCollection $template_engines
 * @property TemplateResolver $template_resolver
 * @property Renderer $renderer
 *
 * @see \ICanBoogie\Binding\Render\Hooks::get_template_engines
 * @see \ICanBoogie\Binding\Render\Hooks::get_template_resolver
 * @see \ICanBoogie\Binding\Render\Hooks::get_renderer
 * @see \ICanBoogie\Binding\Render\Hooks::render
 */
trait CoreBindings
{

}
