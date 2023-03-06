<?php

declare(strict_types=1);

namespace Reinfi\LaminasEnvMapper\Factory;

use Crell\EnvMapper\EnvMapper;
use Psr\Container\ContainerInterface;

class EnvObjectMapperFactory
{
    public function __invoke(ContainerInterface $container, string $requestedName): object
    {
        return (new EnvMapper())->map($requestedName);
    }
}
