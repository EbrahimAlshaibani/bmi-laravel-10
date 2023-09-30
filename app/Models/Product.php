<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'number',
        'name',
        'price',
        'brand',
        'is_available',
    ];
    public function images(): HasMany
    {
        return $this->hasMany(Image::class);
    }
}
