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

use ICanBoogie\Application;
use ICanBoogie\Render\Renderer;
use ICanBoogie\Render\RenderOptions;

final class Hooks
{
    /**
     * Renders a template.
     */
    public static function render(
        Application $app,
        mixed $content,
        RenderOptions $options = new RenderOptions()
    ): ?string {
        return $app->container->get(Renderer::class)->render($content, $options);
    }
}
