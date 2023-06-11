<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'user_id',
        'title',
        'description',
        'number',
        'price',
        'image',
        'status',
    ];

    public function category()
    {
        return $this->belongsTo(\App\Models\Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function reviews()
    {
        return $this->hasMany(\App\Models\Review::class);
    }

    public function scopeActive($query)
    {
        return $query->where('status', true);
    }
}
