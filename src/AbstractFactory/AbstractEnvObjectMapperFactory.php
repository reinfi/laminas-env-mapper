<?php

declare(strict_types=1);

namespace Reinfi\LaminasEnvMapper\AbstractFactory;

use Crell\EnvMapper\EnvMapper;
use Laminas\ServiceManager\Factory\AbstractFactoryInterface;
use Psr\Container\ContainerInterface;
use Reinfi\LaminasEnvMapper\EnvObjectInterface;

class AbstractEnvObjectMapperFactory implements AbstractFactoryInterface
{
    public function __invoke(
        ContainerInterface $container,
        $requestedName,
        ?array $options = null
    ): object {
        return (new EnvMapper())->map($requestedName);
    }

    public function canCreate(ContainerInterface $container, $requestedName): bool
    {
        return is_a($requestedName, EnvObjectInterface::class);
    }
}
