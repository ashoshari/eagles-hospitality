<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'nameAr',
        'description',
        'descriptionAr',
        'size',
        'quantityPerPacket',
        'bestSelling',
        'imageUrl',
        'category_id',
        'public_id'
    ];

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class)->latest();
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
