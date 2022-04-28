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

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

final class CompilerPass implements CompilerPassInterface
{
    public const PARAMETER_ENGINE_BY_EXTENSION = 'render.engine_by_extension';
    public const PARAMETER_EXTENSIONS = 'render.extensions';
    public const TAG = 'render.extension';
    public const TAG_KEY = 'extension';

    public function process(ContainerBuilder $container): void
    {
        /**
         * @var array<string, string>
         *     Where _key_ is an extension and _value_ a service id.
         */
        $extensions = [];

        foreach ($container->findTaggedServiceIds(self::TAG) as $id => $tags) {
            foreach ($tags as $tag) {
                $extensions[$tag[self::TAG_KEY]] = $id;
            }
        }

        $container->setParameter(self::PARAMETER_ENGINE_BY_EXTENSION, $extensions);
        $container->setParameter(self::PARAMETER_EXTENSIONS, array_keys($extensions));
    }
}
