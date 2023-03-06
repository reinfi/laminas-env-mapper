<?php

declare(strict_types=1);

namespace Reinfi\LaminasEnvMapper\Exception;

use Exception;

class InvalidObjectException extends Exception
{
    public function __construct()
    {
        parent::__construct('Invalid object given to map with EnvMapper');
    }
}
