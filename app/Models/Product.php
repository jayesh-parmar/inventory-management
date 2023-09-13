<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Product extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'name',
        'brand_id',
        'color_id',
        'size_id',
        'status'
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }
    public function color()
    {
        return $this->belongsTo(Color::class, 'color_id');
    }
    public function size()
    {
        return $this->belongsTo(Size::class, 'size_id');
    }
}