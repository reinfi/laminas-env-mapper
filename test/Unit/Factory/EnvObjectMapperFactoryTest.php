<?php

declare(strict_types=1);

namespace Reinfi\LaminasEnvMapper\Test\Unit\Factory;

use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;
use Reinfi\LaminasEnvMapper\Exception\InvalidObjectException;
use Reinfi\LaminasEnvMapper\Factory\EnvObjectMapperFactory;
use Reinfi\LaminasEnvMapper\Test\Double\Configuration;

class EnvObjectMapperFactoryTest extends TestCase
{
    protected function setUp(): void
    {
        $_ENV['VALUE'] = 'foo';
    }

    public function testItCreatesConfiguration(): void
    {
        $factory = new EnvObjectMapperFactory();

        $container = $this->createMock(ContainerInterface::class);

        $configuration = $factory($container, Configuration::class);

        self::assertInstanceOf(Configuration::class, $configuration);
        self::assertEquals('foo', $configuration->value);
    }

    public function testItThrowsExceptionIfClassDoesNotExists(): void
    {
        self::expectException(InvalidObjectException::class);

        $factory = new EnvObjectMapperFactory();

        $container = $this->createMock(ContainerInterface::class);

        $factory($container, 'ThisIsNotAClass');
    }
}
