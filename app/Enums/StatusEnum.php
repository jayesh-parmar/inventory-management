<?php

namespace App\Enums;

class StatusEnum
{
    const ACTIVE = 'active';
    const ARCHIVED = 'archived';

    public static function values()
    {
        return [self::ACTIVE, self::ARCHIVED];
    }
}