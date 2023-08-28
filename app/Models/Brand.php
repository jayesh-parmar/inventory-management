<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UuidTrait;


class Brand extends Model
{
    use HasFactory, UuidTrait;

    protected $fillable = [
        'brand_name',
    ];
}
