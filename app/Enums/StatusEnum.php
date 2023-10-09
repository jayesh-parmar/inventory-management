<?php

namespace App\Enums;

class StatusEnum
{
const ACTIVE = 'active';
const ARCHIVED = 'archived';

public static function getStatusesString()
{
    return collect([self::ACTIVE, self::ARCHIVED])->implode(',');
}

public static function values()
{
    return [self::ACTIVE, self::ARCHIVED];
}

}

