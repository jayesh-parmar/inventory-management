<?php

namespace App\Enums;

enum StatusEnum: string
{
    case ACTIVE = 'active';
    case ARCHIVED = 'archived';

    public static function getStatusesString()
    {
        return collect(self::cases())->pluck('value')->implode(',');
    }

    public static function values()
    {
        return [self::ACTIVE, self::ARCHIVED];
    }
}


