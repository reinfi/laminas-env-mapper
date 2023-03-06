<?php

declare(strict_types=1);

namespace Reinfi\LaminasEnvMapper\Factory;

use Crell\EnvMapper\EnvMapper;
use Psr\Container\ContainerInterface;
use Reinfi\LaminasEnvMapper\Exception\InvalidObjectException;

class EnvObjectMapperFactory
{
    public function __invoke(ContainerInterface $container, string $requestedName): object
    {
        if (! class_exists($requestedName)) {
            throw new InvalidObjectException();
        }

        return (new EnvMapper())->map($requestedName);
    }
}
