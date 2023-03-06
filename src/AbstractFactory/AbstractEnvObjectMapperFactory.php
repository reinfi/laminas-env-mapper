<?php

declare(strict_types=1);

namespace Reinfi\LaminasEnvMapper\AbstractFactory;

use Crell\EnvMapper\EnvMapper;
use Laminas\ServiceManager\Factory\AbstractFactoryInterface;
use Psr\Container\ContainerInterface;
use Reinfi\LaminasEnvMapper\EnvObjectInterface;
use Reinfi\LaminasEnvMapper\Exception\InvalidObjectException;

class AbstractEnvObjectMapperFactory implements AbstractFactoryInterface
{
    public function __invoke(
        ContainerInterface $container,
        $requestedName,
        ?array $options = null
    ): object {
        if (! is_string($requestedName) || ! class_exists($requestedName)) {
            throw new InvalidObjectException();
        }

        return (new EnvMapper())->map($requestedName);
    }

    public function canCreate(ContainerInterface $container, $requestedName): bool
    {
        if (! is_string($requestedName) || ! class_exists($requestedName)) {
            return false;
        }

        return is_subclass_of($requestedName, EnvObjectInterface::class);
    }
}
