<?php

namespace Test\ICanBoogie\Binding\Render;

use PHPUnit\Framework\TestCase;

use Symfony\Component\DependencyInjection\ContainerInterface;

use function ICanBoogie\app;

final class ContainerTest extends TestCase
{
    /**
     * @var ContainerInterface
     */
    private mixed $container;

    protected function setUp(): void
    {
        parent::setUp();

        $this->container = app()->container->get('service_container');
    }

    /**
     * @dataProvider provide_parameter
     */
	public function test_parameter(string $param, mixed $expected): void
	{
		$this->assertEquals($expected, $this->container->getParameter($param));
	}

    public function provide_parameter(): array
    {
        return [

            [ 'render.engine_by_extension', [
                '.php' => 'ICanBoogie\Render\PHPEngine',
                '.phtml' => 'ICanBoogie\Render\PHPEngine',
            ] ]

        ];
    }
}
