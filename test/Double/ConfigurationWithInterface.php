<?php

declare(strict_types=1);

namespace Reinfi\LaminasEnvMapper\Test\Double;

use Reinfi\LaminasEnvMapper\EnvObjectInterface;

class ConfigurationWithInterface implements EnvObjectInterface
{
    public function __construct(
        public readonly string $value
    ) {
    }
}
