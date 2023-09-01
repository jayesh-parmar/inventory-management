<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use RectorLaravel\Rector\MethodCall\RedirectRouteToToRouteHelperRector;
use Rector\Set\ValueObject\LevelSetList;
use Rector\Set\ValueObject\SetList;
use RectorLaravel\Set\LaravelSetList;


return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->paths([
        __DIR__ . '/app',
        __DIR__ . '/config',
        __DIR__ . '/database',
        __DIR__ . '/public',
        __DIR__ . '/resources',
        __DIR__ . '/routes',
    ]);

    $rectorConfig->sets([
        SetList::DEAD_CODE,
        SetList::CODE_QUALITY,
        LevelSetList::UP_TO_PHP_82,
        LaravelSetList::LARAVEL_100,
        SetList::PHP_70,
        SetList::PHP_71,
        SetList::PHP_72,
        SetList::PHP_73,
        SetList::PHP_74,
        SetList::PHP_80,
        SetList::PHP_81,
        SetList::PHP_82,
        SetList::NAMING,
        SetList::PHP_52,
        SetList::PHP_53,
        SetList::PHP_54,
        SetList::PHP_55,
        SetList::PHP_56,
        SetList::PRIVATIZATION,
        SetList::TYPE_DECLARATION,
        SetList::EARLY_RETURN,
        SetList::INSTANCEOF,
        SetList::GMAGICK_TO_IMAGICK,
        SetList::CODING_STYLE,
        SetList::STRICT_BOOLEANS,    
    ]);

    $rectorConfig->rule(RedirectRouteToToRouteHelperRector::class);
};
