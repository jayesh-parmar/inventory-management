<?php

namespace App\Enums;

class StatusEnum
{
const ACTIVE = 'active';
const ARCHIVED = 'archived';

public static function getStatusesString()
{
$statuses = self::values();
return collect($statuses)->implode(',');
}

public static function values()
{
return [self::ACTIVE, self::ARCHIVED];
}
}

// Now you can use it like this:
$statuses = StatusEnum::getStatusesString();