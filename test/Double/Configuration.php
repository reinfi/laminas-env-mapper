<?php

declare(strict_types=1);

namespace Reinfi\LaminasEnvMapper\Test\Double;

class Configuration
{
    public function __construct(
        public readonly string $value
    ) {
    }
}
