<?php

declare(strict_types=1);

namespace Reinfi\LaminasEnvMapper\Test\Unit\AbstractFactory;

use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;
use Reinfi\LaminasEnvMapper\AbstractFactory\AbstractEnvObjectMapperFactory;
use Reinfi\LaminasEnvMapper\Exception\InvalidObjectException;
use Reinfi\LaminasEnvMapper\Test\Double\Configuration;
use Reinfi\LaminasEnvMapper\Test\Double\ConfigurationWithInterface;

class AbstractEnvObjectMapperFactoryTest extends TestCase
{
    protected function setUp(): void
    {
        $_ENV['VALUE'] = 'foo';
    }

    public function testItSupportsOnlyObjectsWithInterface(): void
    {
        $factory = new AbstractEnvObjectMapperFactory();

        $container = $this->createMock(ContainerInterface::class);

        self::assertTrue($factory->canCreate($container, ConfigurationWithInterface::class));
        self::assertFalse($factory->canCreate($container, Configuration::class));
    }

    public function testItCreatedObject(): void
    {
        $factory = new AbstractEnvObjectMapperFactory();

        $container = $this->createMock(ContainerInterface::class);

        $configuration = $factory($container, ConfigurationWithInterface::class);

        self::assertInstanceOf(ConfigurationWithInterface::class, $configuration);
        self::assertEquals('foo', $configuration->value);
    }

    public function testItThrowsExceptionIfClassDoesNotExists(): void
    {
        self::expectException(InvalidObjectException::class);

        $factory = new AbstractEnvObjectMapperFactory();

        $container = $this->createMock(ContainerInterface::class);

        $factory($container, 'ThisIsNotAClass');
    }
}
