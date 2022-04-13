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

use ICanBoogie\Render\TemplateResolver;
use ICanBoogie\Render\TemplateResolverDecorator;
use ICanBoogie\Render\TemplateResolverDecoratorTrait;
use ICanBoogie\Render\TemplateResolverTrait;

use function array_reverse;
use function file_exists;

/**
 * Decorates a template resolver and adds support for the application paths.
 */
final class ApplicationTemplateResolver implements TemplateResolverDecorator
{
    use TemplateResolverTrait;
    use TemplateResolverDecoratorTrait;

    /**
     * Application paths.
     *
     * @var string[]
     */
    private array $paths;

    /**
     * @param string[] $paths Application paths.
     */
    public function __construct(TemplateResolver $template_resolver, array $paths)
    {
        $this->template_resolver = $template_resolver;
        $this->paths = $this->expend_paths($paths);
    }

    /**
     * @inheritdoc
     */
    public function resolve(string $name, array $extensions, array &$tried = [])
    {
        if (str_starts_with($name, '//')) {
            return $this->resolve_from_app(substr($name, 2), $extensions, $tried);
        }

        $template = $this->resolve_from_app($name, $extensions, $tried);

        if ($template) {
            return $template;
        }

        return $this->template_resolver->resolve($name, $extensions, $tried);
    }

    /**
     * Resolves a template name from the application paths.
     */
    private function resolve_from_app(string $name, array $extensions, array &$tried): ?string
    {
        return $this->resolve_path($this->resolve_tries($this->paths, $name, $extensions), $tried);
    }

    /**
     * Expends application paths into template paths.
     *
     * **Note:** Paths that do not have a "templates" directory are discarded.
     */
    private function expend_paths(array $paths): array
    {
        $resolved_paths = [];

        foreach (array_reverse($paths) as $path) {
            $path .= 'templates' . DIRECTORY_SEPARATOR;

            if (file_exists($path)) {
                $resolved_paths[] = $path;
            }
        }

        return $resolved_paths;
    }
}
