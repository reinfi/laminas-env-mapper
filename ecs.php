<?php

declare(strict_types=1);

use Symplify\EasyCodingStandard\Config\ECSConfig;
use Symplify\EasyCodingStandard\ValueObject\Set\SetList;

return static function (ECSConfig $configurator): void {
    // make ECS 16x faster
    $configurator->parallel();

    $configurator->paths([
        __DIR__ . '/src/',
        __DIR__ . '/test/',
    ]);

    // import SetList here in the end of ecs. is on purpose
    // to avoid overridden by existing Skip Option in current config
    $configurator->import(SetList::PSR_12);
    $configurator->import(SetList::COMMON);
    $configurator->import(SetList::NAMESPACES);
    $configurator->import(SetList::CLEAN_CODE);

    $configurator->lineEnding("\n");
};
